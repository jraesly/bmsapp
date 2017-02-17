// plugin start

/*
 * jQuery Field Plug-in
 *
 * Copyright (c) 2011 Dan G. Switzer, II
 *
 * Dual licensed under the MIT and GPL licenses:
 *   http://www.opensource.org/licenses/mit-license.php
 *   http://www.gnu.org/licenses/gpl.html
 *
 * Version: 0.9.6
 *
 * NOTES: The getValue() and setValue() methods are designed to be
 * executed on single field (i.e. any field that would share the same
 * "name" attribute--a single text box, a group of checkboxes or radio
 * elements, etc.)
 *
 * Revision History
 * v0.9.6
 * - Added clear argument to fieldHash() and formHash() method for resetting
 *   values not in the supplied hash map; default is still to ignore values
 *   not in the hash map
 *
 * v0.9.5
 * - Fixed issue with IE9 not getting option tag values with certain doctypes
 * - Added fieldHash() for grabbing fields out by a CSS selector (the formHash()
 *   requires a form object)
 *
 * v0.9.4
 * - Fixed issues with jQuery v1.6.x
 * - Fixed file fields not currently supported by getValue or getType
 * - Fixed formHash breaks on fields with apostrophes
 * - Fixed moveNext() did not work, it have invisible parent
 *
 * v0.9.3
 * - Enhanced createCheckboxRange() to trigger change handler for each checkbox
 *   being changed
 * - Enhanced createCheckboxRange() to pass in event object when triggering click
 *   callback
 *
 * v0.9.2
 * - Fixed code for jQuery v1.3.x support
 * - Fixed bug #6333 - setValue when value is typeof "number" and it is 0 (zero)
 * - Fixed bug in autoAdvance where it wasn't correctly advancing to the next field
 * - Fixed bug in createCheckboxRange where it where the high value wouldn't always
 *   be unchecked/checked
 *
 * v0.9.1
 * - Optimized the createCheckboxRange to reduced complexity and code size.
 *   Functionality has not changed.
 *
 * v0.9
 * - Removed createCheckboxRange custom event, this fixes problems with
 *   older jQuery versions that have problems with the trigger
 * - Changed the limitSelection() function to use an options argument,
 *   instead of all the individual arguments
 *
 * v0.8.1
 * - createCheckboxRange() no longer breaks the chain
 * - Added callback to createCheckboxRange() (the trigger() method
 *   does not execute correctly in jQuery v1.1.2, so this functionality
 *   doesn't work in that version.)
 * - Added configurable setting for the [SHIFT] key bind to the
 *   createCheckboxRange().
 * - Added the $.Field.setProperty() and getProperty() methods
 *
 * v0.8
 * - Fixed "bug in checkbox range" (http://plugins.jquery.com/node/1642)
 * - Fixed "Bug when setting value on a select element and the select is empty"
 *   (http://plugins.jquery.com/node/1281)
 *
 * v0.7.1
 * - Changed a comma in code to a semi-colon in a variable definition line
 * - Fixed code to work in min mode
 * - Fixed bug in hashForm() that would not see struct keys with empty values
 *
 * v0.7
 * - Added tabIndex related function (getTabIndex, moveNext, movePrev, moveIndex)
 *
 * v0.6
 * - Fixed bug in the $.formHash() where the arrayed form elements would
 *   not correctly report their values.
 * - Added the $.createCheckboxRange() which allow you to select multiple
 *   checkbox elements by doing a [SHIFT] + click.
 *
 * v0.5
 * - Added $.limitSelection() method for limiting the number of
 *   selection in a select-multiple of checkbox array.
 *
 * v0.4.1
 * - Moved $.type and $.isType into private functions
 * - Rewrote $type() function to use instanceof operator
 *
 * v0.4
 * - Added the formHash() method
 *
 * v0.3
 * - First public release
 *
 */
(function($){

    // set the defaults
    var defaults = {
        // use a comma as the string delimiter
        delimiter: ",",
        // the default key binding to check for when using the createCheckboxRange()
        checkboxRangeKeyBinding: "shiftKey",
        // for methods that could return either a string or array, decide default behavior
        useArray: false
    };

    // set default options
    $.Field = {
        version: "0.9.6",
        setDefaults: function(options){
            $.extend(defaults, options);
        },
        setProperty: function(prop, value){
            defaults[prop] = value;
        },
        getProperty: function(prop){
            return defaults[prop];
        }
    };


    /*
     * jQuery.fn.fieldArray()
     *
     * returns either an array of values or a jQuery object
     *
     * NOTE: This *MAY* break the jQuery chain
     *
     * Examples:
     * $("input[name='name']").fieldArray();
     * > Gets the current value of the name text element
     *
     * $("input[name='name']").fieldArray(["Dan G. Switzer, II"]);
     * > Sets the value of the name text element to "Dan G. Switzer, II"
     *
     * $("select[name='state']").fieldArray();
     * > Gets the current value of the state text element
     *
     * $("select[name='state']").setValue(["OH","NY","CA"]);
     * > Sets the selected value of the "state" select element to OH, NY and CA
     *
     */
    // this will set/get the values for a field based upon and array
    $.fn.fieldArray = function(v){
        var t = $type(v);

        // if no value supplied, return an array of values
        if( t == "undefined" ) return getValue(this);

        // convert the number/string into an array
        if( t == "string" ||  t == "number" ){
            v = v.toString().split(defaults.delimiter);
            t = "array";
        }

        // set the value -- doesn't break the chaing
        if( t == "array" ) return setValue(this, v);

        // if we don't know what do to, don't break the chain
        return this;
    };

    /*
     * jQuery.fn.getValue()
     *
     * returns String - a comma delimited list of values for the field
     *
     * NOTE: Breaks the jQuery chain, since it returns a string.
     *
     * Examples:
     * $("input[name='name']").getValue();
     * > This would return the value of the name text element
     *
     * $("select[name='state']").getValue();
     * > This would return the currently selected value of the "state" select element
     *
     */
    // the getValue() method -- break the chain
    $.fn.getValue = function(){
        // return the values as a comma-delimited string
        return getValue(this).join(defaults.delimiter);
    };

    /*
     * getValue()
     *
     * returns Array - an array of values for the field
     *
     */
    // the getValue() method -- break the chain
    var getValue = function(jq){
        var v = [];

        jq.each(
            function (lc){
                // get the current type
                var t = getType(this);

                switch( t ){
                    case "checkbox": case "radio":
                    // if the checkbox or radio element is checked
                    if( this.checked ) v.push(this.value);
                    break;

                    case "select":
                        if( this.type == "select-one" ){
                            v.push( (this.selectedIndex == -1) ? "" : getOptionVal(this[this.selectedIndex]) );
                        } else {
                            // loop through all element in the array for this field
                            for( var i=0; i < this.length; i++ ){
                                // if the element is selected, get the selected values
                                if( this[i].selected ){
                                    // append the selected value, if the value property doesn't exist, use the text
                                    v.push(getOptionVal(this[i]));
                                }
                            }
                        }
                        break;

                    case "text":
                        v.push(this.value);
                        break;
                }
            }
        );

        // return the values as an array
        return v;
    };

    /*
     * setValue()
     *
     * returns jQuery object
     *
     * NOTE: This does *NOT* break the jQuery chain
     *
     * Examples:
     * $("input[name='name']").setValue("Dan G. Switzer, II");
     * > Sets the value of the name text element to "Dan G. Switzer, II"
     *
     * $("select[name='state']").setValue("OH");
     * > Sets the selected value of the "state" select element to "OH"
     *
     */
    // the setValue() method -- does *not* break the chain
    $.fn.setValue = function(v){
        // f no value, set to empty string
        return setValue(this, ((!v && (v !== 0)) ? [""] : v.toString().split(defaults.delimiter)));
    };

    /*
     * setValue()
     *
     * returns jQuery object
     *
     */
    // the setValue() method -- does *not* break the chain
    var setValue = function(jq, v){
        jq.each(
            function (lc){
                var t = getType(this), x;

                switch( t ){
                    case "checkbox": case "radio":
                    if( valueExists(v, this.value) ) this.checked = true;
                    else this.checked = false;
                    break;

                    case "select":
                        var bSelectOne = (this.type == "select-one");
                        var bKeepLooking = true; // if select-one type, then only select the first value found
                        // loop through all element in the array for this field
                        for( var i=0; i < this.length; i++ ){
                            x = getOptionVal(this[i]);
                            bSelectItem = valueExists(v, x);
                            if( bSelectItem ){
                                this[i].selected = true;
                                // if a select-one element
                                if( bSelectOne ){
                                    // no need to look farther
                                    bKeepLooking = false;
                                    // stop the loop
                                    break;
                                }
                            } else if( !bSelectOne ) this[i].selected = false;
                        }
                        // if a select-one box and nothing selected, then try to select the default value
                        if( bSelectOne && bKeepLooking && !!this[0] ){
                            this[0].selected = true;
                        }
                        break;

                    case "text":
                        this.value = v.join(defaults.delimiter);
                        break;
                }

            }
        );

        return jq;
    };

    /*
     * jQuery.fn.formHash()
     *
     * returns either an hash table of form fields or a jQuery object
     *
     * NOTE: This *MAY* break the jQuery chain
     *
     * Examples:
     * $("#formName").formHash();
     * > Returns a hash map of all the form fields and their values
     *
     * $("#formName").formHash({"name": "Dan G. Switzer, II", "state": "OH"});
     * > Returns the jQuery chain and sets the fields "name" and "state" with
     * > the values "Dan G. Switzer, II" and "OH" respectively.
     *
     */
    // the formHash() method -- break the chain (we could use fieldHash() now, but we stick w/DOM access for speed)
    $.fn.formHash = function(map, clear){
        var isGet = (arguments.length == 0);
        // create a hash to return
        var hash = {};

        // run the code for each form
        this.filter("form").each(
            function (){
                // get all the form elements
                var els = this.elements, el, n, fields = {}, $el;

                // loop through the elements and process
                for( var i=0, elsMax = els.length; i < elsMax; i++ ){
                    el = els[i];
                    n = el.name;

                    // if the element doesn't have a name, then skip it
                    if( !n || fields[n] ) continue;

                    // create a jquery object to the current named form elements (for fields containing apostrophe's, escape them)
                    var $el = $(el.form[n]);

                    // if we're getting the values, get them now
                    if( isGet ){
                        hash[n] = $el[defaults.useArray ? "fieldArray" : "getValue"]();
                        // if we're setting values, set them now
                    } else if( n in map ){
                        $el[defaults.useArray ? "fieldArray" : "setValue"](map[n]);
                    } else if( clear === true ){
                        $el[defaults.useArray ? "fieldArray" : "setValue"]("");
                    }

                    fields[n] = true;
                }
            }
        );

        // if getting a hash map return it, otherwise return the jQuery object
        return (isGet) ? hash : this;
    };

    /*
     * jQuery.fn.fieldHash()
     *
     * Returns either an hash table of form fields matching the selector or a jQuery object
     *
     * NOTE: This *MAY* break the jQuery chain
     *
     * Examples:
     * $("#formName").fieldHash();
     * > Returns a hash map of all the form fields matched by the selector and their values.
     *
     * $("#formName").fieldHash({"name": "Dan G. Switzer, II", "state": "OH"});
     * > Returns the jQuery chain and sets the fields "name" and "state" with
     * > the values "Dan G. Switzer, II" and "OH" respectively--provided the fields exist in the jQuery selector.
     *
     */
    // the fieldHash() method -- break the chain
    $.fn.fieldHash = function(map, clear){
        var isGet = !(map && typeof map == "object");
        // create a hash to return
        var hash = {}, fields = {};

        // run the code for each form field
        this.filter(":input").each(
            function (){
                var el = this, n = el.name;

                // if the element doesn't have a name or it's already processed--stop
                if( !n || fields[n] ) return;

                // create a jquery object to the current named form elements (for fields containing apostrophe's, escape them)
                var $el = $(el.form[n]);

                // if we're getting the values, get them now
                if( isGet ){
                    hash[n] = $el[defaults.useArray ? "fieldArray" : "getValue"]();
                    // if we're setting values, set them now
                } else if( n in map ){
                    $el[defaults.useArray ? "fieldArray" : "setValue"](map[n]);
                } else if( clear === true ){
                    $el[defaults.useArray ? "fieldArray" : "setValue"]("");
                }

                fields[n] = true;
            }
        );

        // if getting a hash map return it, otherwise return the jQuery object
        return (isGet) ? hash : this;
    };

    /*
     * jQuery.fn.autoAdvance()
     *
     * Finds all text-based input fields and makes them autoadvance to the next
     * fields when they've met their maxlength property.
     *
     *
     * Examples:
     * $("#form").autoAdvance();
     * > When a field reaches it's maxlength attribute value, it'll advance to the
     * > next field in the form's tabindex.
     *
     * $("#form").autoAdvance(callback);
     * > Automatic advances to next field and triggers the callback function on the
     * > field the user left.
     *
     */
    // the autoAdvance() method
    $.fn.autoAdvance = function(callback){
        return this.find(":text,:password,textarea").bind(
            "keyup.autoAdvance",
            function (e){
                var
                // get the field
                    $field = $(this),
                // get the maxlength for the field
                    iMaxLength = parseInt($field.attr("maxlength"), 10);

                // if the user tabs to the field, exit event handler
                // this will prevent movement if the field is already
                // field in with the max number of characters
                if( isNaN(iMaxLength) || ("|9|16|37|38|39|40|".indexOf("|" + e.keyCode + "|") > -1) ) return true;

                // if the value of the field is greater than maxlength attribute,
                // then move the focus to the next field
                if( $field.getValue().length >= $field.attr("maxlength") ){
                    // move to the next field and select the existing value
                    var $next = $field.moveNext().select();
                    if( $.isFunction(callback) ) callback.apply($field, [$next]);
                }
            }
        );
    };

    /*
     * jQuery.fn.moveNext()
     *
     * places the focus in the next form field. if the field element is
     * the last in the form array, it'll return to the top.
     *
     * returns a jQuery object pointing to the next field element
     *
     * NOTE: if the selector returns multiple items, the first item is used.
     *
     *
     * Examples:
     * $("#firstName").moveNext();
     * > Moves the focus to the next form field found after firstName
     *
     */
    // the moveNext() method
    $.fn.moveNext = function(){
        return this.moveIndex("next");
    };

    /*
     * jQuery.fn.movePrev()
     *
     * places the focus in the previous form field. if the field element is
     * the first in the form array, it'll return to the last element.
     *
     * returns a jQuery object pointing to the previos field element
     *
     * NOTE: if the selector returns multiple items, the first item is used
     *
     * Examples:
     * $("#firstName").movePrev();
     * > Moves the focus to the next form field found after firstName
     *
     */
    // the movePrev() method
    $.fn.movePrev = function(){
        return this.moveIndex("prev");
    };

    /*
     * jQuery.fn.moveIndex()
     *
     * Places the tab index into the specified index position
     *
     * returns a jQuery object pointing to the previos field element
     *
     * NOTE: if the selector returns multiple items, the first item is used
     *
     * Examples:
     * $("#firstName").movePrev();
     * > Moves the focus to the next form field found after firstName
     *
     */
    // the moveIndex() method
    $.fn.moveIndex = function(i){
        // get the current position and elements
        var pos = getFieldPosition(this);

        // if a string option has been specified, calculate the position
        if( i == "next" ) i = pos[0] + 1; // get the next item
        else if( i == "prev" ) i = pos[0] - 1; // get the previous item

        // make sure the index position is within the bounds of the elements array
        if( i < 0 ) i = pos[1].length - 1;
        else if( i >= pos[1].length ) i = 0;

        return $(pos[1][i]).trigger("focus");
    };

    /*
     * jQuery.fn.getTabIndex()
     *
     * gets the current tab index of the first element found in the selector
     *
     * NOTE: if the selector returns multiple items, the first item is used
     *
     * Examples:
     * $("#firstName").getTabIndex();
     * > Gets the tabIndex for the firstName field
     *
     */
    // the getTabIndex() method
    $.fn.getTabIndex = function(){
        // return the position of the form field
        return getFieldPosition(this)[0];
    };

    var getFieldPosition = function (jq){
        var
        // get the first matching field
            $field = jq.filter("input, select, textarea").get(0),
        // store items with a tabindex
            tabIndex = [],
        // store items with no tabindex
            posIndex = [];

        // if there is no match, return 0
        if( !$field ) return [-1, []];

        // make a single pass thru all form elements
        $.each(
            $field.form.elements,
            function (i, o){
                if( o.tagName != "FIELDSET" && !o.disabled && jQuery(o).is(":visible") ){
                    if( o.tabIndex > 0 ){
                        tabIndex.push(o);
                    } else {
                        posIndex.push(o);
                    }
                }
            }
        );

        // sort the fields that had tab indexes
        tabIndex.sort(
            function (a, b){
                return a.tabIndex - b.tabIndex;
            }
        );

        // merge the elements to create the correct tab position
        tabIndex = $.merge(tabIndex, posIndex);

        for( var i=0; i < tabIndex.length; i++ ){
            if( tabIndex[i] == $field ) return [i, tabIndex];
        }

        return [-1, tabIndex];
    };

    /*
     * jQuery.fn.limitSelection()
     *
     * limits the number of items that can be selected
     *
     * Examples:
     * $("input:checkbox").limitSelection(3);
     * > No more than 3 items can be selected
     *
     * $("input:checkbox").limitSelection(2, {onsuccess: function (), onfailure: function ()});
     * > Limits the selection to 2 items and runs the callback function when
     * > more than 2 items have been selected.
     *
     * NOTE: Current when a "select-multiple" option undoes the selection,
     * it selects the first 3 options in the array--which isn't necessarily
     * the first 3 options the user selected. This is not the most desired
     * behavior.
     *
     */
    $.fn.limitSelection = function(limit, options){
        // get the options to use
        var opt = jQuery.extend(
            (limit && limit.constructor == Object ? limit : {
                limit: limit
                , onsuccess: function (limit){ return true; }
                , onfailure: function (limit){ alert("You can only select a maximum a of " + limit + " items."); return false; }
            })
            , options);

        var self = this;

        var getCount = function (el){
            if( el.type == "select-multiple" ) return $("option:selected", self).length;
            else if( el.type == "checkbox" ) return self.filter(":checked").length;
            return 0;
        };

        var undoSelect = function (){
            // reduce selection to n items
            setValue(self, getValue(self).slice(0, opt.limit));
            // do callback
            return opt.onfailure.apply(self, [opt.limit]);
        };

        return this.bind(
            (!!self[0] && self[0].type == "select-multiple") ? "change.limitSelection" : "click.limitSelection",
            function (){
                if( getCount(this) > opt.limit ){
                    // run callback, it must return false to prevent action
                    return (this.type == "select-multiple") ? undoSelect() : opt.onfailure.apply(self, [opt.limit]);
                }
                opt.onsuccess.apply(self, [opt.limit]);
                return true;
            }
        );
    };

    /*
     * jQuery.fn.createCheckboxRange()
     *
     * limits the number of items that can be selected
     *
     * Examples:
     * $("input:checkbox").createCheckboxRange();
     * > Allows a [SHIFT] + mouseclick to select all the items from the last
     * > checked checkmark to the current checkbox.
     *
     * $("input:checkbox").createCheckboxRange(callback);
     * > Runs the callback method for each item who's checked status changes.
     * > This allows you to build hooks to highlight rows.
     *
     */
    $.fn.createCheckboxRange = function(callback){
        // get the options to use
        var opt = jQuery.extend(
            (callback && callback.constructor == Object ? callback : {
                bind: defaults.checkboxRangeKeyBinding
                , click: callback
            })
            , callback);

        var iLastSelection = 0, self = this, bCallback = $.isFunction(opt.click);

        // if there's a call back, bind it now and run it
        if( bCallback )
            this.each(function (){opt.click.apply(this, [$.event.fix({type: null}), $(this).is(":checked")])});

        // loop through each checkbox and return the jQuery object
        return this.each(
            function (){
                // only perform this action on checkboxes
                if( this.type != "checkbox" ) return false;
                var el = this;

                var updateLastCheckbox = function (e){
                    iLastSelection = self.index(e.target);
                };

                var checkboxClicked = function (e){
                    var bSetChecked = this.checked, current = self.index(e.target), low = Math.min(iLastSelection, current), high = Math.max(iLastSelection+1, current);
                    // run the callback for the clicked item
                    if( bCallback ) opt.click.apply(this, [e, bSetChecked]);
                    // if we don't detect the keypress, exit function
                    if( !e[opt.bind] ) return;

                    // loop through the items in the selected range
                    for( var i=low; i < high; i++ ){
                        // make sure to correctly set the checked status and run the change handler
                        var item = self.eq(i).attr("checked", bSetChecked).trigger("change");
                        // run the callback
                        if( bCallback ) opt.click.apply(item[0], [e, bSetChecked]);
                    }

                    return true;
                };

                $(this)
                    // unbind the events so we can re-run the createCheckboxRange() plug-in for dynamically created elements
                    .unbind("click.createCheckboxRange")

                    // bind the functions, we bind on blur for keyboard selected items
                    .bind("click.createCheckboxRange", checkboxClicked)
                    .bind("click.createCheckboxRange", updateLastCheckbox)
                ;

                return true;
            }
        );
    };

    // determines how to process a field
    var getType = function (el){
        var t = el.type;

        switch( t ){
            case "select": case "select-one": case "select-multiple":
            t = "select";
            break;
            case "text": case "hidden": case "textarea": case "password": case "button": case "submit": case "submit": case "file":
            t = "text";
            break;
            case "checkbox": case "radio":
            t = t;
            break;
        }
        return t;
    };

    // gets the value of a select element
    var getOptionVal = function (el){
        // the attributes.specfied hack is for IE < 9 to deal with <option> tags with no value attribute
        return el.value || ((el.attributes && el.attributes['value'] && !(el.attributes['value'].specified)) ? el.text : null) || "";
    };

    // checks to see if a value exists in an array
    var valueExists = function (a, v){
        return ($.inArray(v, a) > -1);
    };

    // correctly gets the type of an object (including array/dates)
    var $type = function (o){
        var t = (typeof o).toLowerCase();

        if( t == "object" ){
            if( o instanceof Array ) t = "array";
            else if( o instanceof Date ) t = "date";
        }
        return t;
    };

    // checks to see if an object is the specified type
    var $isType = function (o, v){
        return ($type(o) == String(v).toLowerCase());
    };

})(jQuery);

/*
 * jQuery Calculation Plug-in
 *
 * Copyright (c) 2011 Dan G. Switzer, II
 *
 * Dual licensed under the MIT and GPL licenses:
 *   http://www.opensource.org/licenses/mit-license.php
 *   http://www.gnu.org/licenses/gpl.html
 *
 * Revision: 13
 * Version: 0.4.09
 *
 * Revision History
 * v0.4.09
 * - Minor tweak to regex for FF7
 *
 * v0.4.08
 * - Added missing semi-colon to lines
 *
 * v0.4.07
 * - Added trim to parseNumber to fix issue with whitespace in elements
 *
 * v0.4.06
 * - Added support for calc() "format" callback so that if return value
 *   is null, then value is not updated
 * - Added jQuery.isFunction() check for calc() callbacks
 *
 * v0.4.05
 * - Added support to the sum() & calc() method for automatically fixing precision
 *   issues (will detect the max decimal spot in the number and fix to that
 *   depth)
 *
 * v0.4.04
 * - Fixed bug #5420 by adding the defaults.cleanseNumber handler; you can
 *   override this function to handle stripping number of extra digits
 *
 * v0.4.02
 * - Fixed bug where bind parameter was not being detecting if you specified
 *   a string in method like sum(), avg(), etc.
 *
 * v0.4a
 * - Fixed bug in aggregate functions so that a string is passed to jQuery's
 *   text() method (since numeric zero is interpetted as false)
 *
 * v0.4
 * - Added support for -$.99 values
 * - Fixed regex so that decimal values without leading zeros are correctly
 *   parsed
 * - Removed defaults.comma setting
 * - Changed secondary regex that cleans additional formatting from parsed
 *   number
 *
 * v0.3
 * - Refactored the aggregate methods (since they all use the same core logic)
 *   to use the $.extend() method
 * - Added support for negative numbers in the regex)
 * - Added min/max aggregate methods
 * - Added defaults.onParseError and defaults.onParseClear methods to add logic for
 *   parsing errors
 *
 * v0.2
 * - Fixed bug in sMethod in calc() (was using getValue, should have been setValue)
 * - Added arguments for sum() to allow auto-binding with callbacks
 * - Added arguments for avg() to allow auto-binding with callbacks
 *
 * v0.1a
 * - Added semi-colons after object declaration (for min protection)
 *
 * v0.1
 * - First public release
 *
 */
(function($){

    // set the defaults
    var defaults = {
        // regular expression used to detect numbers, if you want to force the field to contain
        // numbers, you can add a ^ to the beginning or $ to the end of the regex to force the
        // the regex to match the entire string: /^(-?\$?)(\d+(,\d{3})*(\.\d{1,})?|\.\d{1,})$/g
        //
        // To find European formated numbers, use: /(-?\$?)(\d+(\.\d{3})*(,\d{1,})?|,\d{1,})/g
        reNumbers: /(-?\$?)(\d+(,\d{3})*(\.\d{1,})?|\.\d{1,})/g
        // this function is used in the parseNumber() to cleanse up any found numbers
        // the function is intended to remove extra information found in a number such
        // as extra commas and dollar signs. override this function to strip European values
        , cleanseNumber: function (v){
            // cleanse the number one more time to remove extra data (like commas and dollar signs)
            // For European numbers use: v.replace(/[^0-9,\-]/g, "").replace(/,/g, ".")
            return v.replace(/[^0-9.\-]/g, "");
        }
        // should the Field plug-in be used for getting values of :input elements?
        , useFieldPlugin: (!!$.fn.getValue)
        // a callback function to run when an parsing error occurs
        , onParseError: null
        // a callback function to run once a parsing error has cleared
        , onParseClear: null
    };

    // set default options
    $.Calculation = {
        version: "0.4.09",
        setDefaults: function(options){
            $.extend(defaults, options);
        }
    };


    /*
     * jQuery.fn.parseNumber()
     *
     * returns Array - detects the DOM element and returns it's value. input
     *                 elements return the field value, other DOM objects
     *                 return their text node
     *
     * NOTE: Breaks the jQuery chain, since it returns a Number.
     *
     * Examples:
     * $("input[name^='price']").parseNumber();
     * > This would return an array of potential number for every match in the selector
     *
     */
    // the parseNumber() method -- break the chain
    $.fn.parseNumber = function(options){
        var aValues = [];
        options = $.extend(options, defaults);

        this.each(
            function (){
                var
                // get a pointer to the current element
                    $el = $(this),
                // determine what method to get it's value
                    sMethod = ($el.is(":input") ? (defaults.useFieldPlugin ? "getValue" : "val") : "text"),
                // parse the string and get the first number we find
                    v = $.trim($el[sMethod]()).match(defaults.reNumbers, "");

                // if the value is null, use 0
                if( v == null ){
                    v = 0; // update value
                    // if there's a error callback, execute it
                    if( jQuery.isFunction(options.onParseError) ) options.onParseError.apply($el, [sMethod]);
                    $.data($el[0], "calcParseError", true);
                    // otherwise we take the number we found and remove any commas
                } else {
                    // clense the number one more time to remove extra data (like commas and dollar signs)
                    v = options.cleanseNumber.apply(this, [v[0]]);
                    // if there's a clear callback, execute it
                    if( $.data($el[0], "calcParseError") && jQuery.isFunction(options.onParseClear) ){
                        options.onParseClear.apply($el, [sMethod]);
                        // clear the error flag
                        $.data($el[0], "calcParseError", false);
                    }
                }
                aValues.push(parseFloat(v, 10));
            }
        );

        // return an array of values
        return aValues;
    };

    /*
     * jQuery.fn.calc()
     *
     * returns Number - performance a calculation and updates the field
     *
     * Examples:
     * $("input[name='price']").calc();
     * > This would return the sum of all the fields named price
     *
     */
    // the calc() method
    $.fn.calc = function(expr, vars, cbFormat, cbDone){
        var
        // create a pointer to the jQuery object
            $this = this
        // the value determine from the expression
            , exprValue = ""
        // track the precision to use
            , precision = 0
        // a pointer to the current jQuery element
            , $el
        // store an altered copy of the vars
            , parsedVars = {}
        // temp variable
            , tmp
        // the current method to use for updating the value
            , sMethod
        // a hash to store the local variables
            , _
        // track whether an error occured in the calculation
            , bIsError = false;

        // look for any jQuery objects and parse the results into numbers
        for( var k in vars ){
            // replace the keys in the expression
            expr = expr.replace( (new RegExp("(" + k + ")", "g")), "_.$1");
            if( !!vars[k] && !!vars[k].jquery ){
                parsedVars[k] = vars[k].parseNumber();
            } else {
                parsedVars[k] = vars[k];
            }
        }

        this.each(
            function (i, el){
                var p, len;
                // get a pointer to the current element
                $el = $(this);
                // determine what method to get it's value
                sMethod = ($el.is(":input") ? (defaults.useFieldPlugin ? "setValue" : "val") : "text");

                // initialize the hash vars
                _ = {};
                for( var k in parsedVars ){
                    if( typeof parsedVars[k] == "number" ){
                        _[k] = parsedVars[k];
                    } else if( typeof parsedVars[k] == "string" ){
                        _[k] = parseFloat(parsedVars[k], 10);
                    } else if( !!parsedVars[k] && (parsedVars[k] instanceof Array) ) {
                        // if the length of the array is the same as number of objects in the jQuery
                        // object we're attaching to, use the matching array value, otherwise use the
                        // value from the first array item
                        tmp = (parsedVars[k].length == $this.length) ? i : 0;
                        _[k] = parsedVars[k][tmp];
                    }

                    // if we're not a number, make it 0
                    if( isNaN(_[k]) ) _[k] = 0;

                    // check for decimals and check the precision
                    p = _[k].toString().match(/\.\d+$/gi);
                    len = (p) ? p[0].length-1 : 0;

                    // track the highest level of precision
                    if( len > precision ) precision = len;
                }


                // try the calculation
                try {
                    exprValue = eval( expr );

                    // fix any the precision errors
                    if( precision ) exprValue = Number(exprValue.toFixed(Math.max(precision, 4)));

                    // if there's a format callback, call it now
                    if( jQuery.isFunction(cbFormat) ){
                        // get return value
                        var tmp = cbFormat.apply(this, [exprValue]);
                        // if we have a returned value (it's null null) use it
                        if( !!tmp ) exprValue = tmp;
                    }

                    // if there's an error, capture the error output
                } catch(e){
                    exprValue = e;
                    bIsError = true;
                }

                // update the value
                $el[sMethod](exprValue.toString());
            }
        );

        // if there's a format callback, call it now
        if( jQuery.isFunction(cbDone) ) cbDone.apply(this, [this]);

        return this;
    };

    /*
     * Define all the core aggregate functions. All of the following methods
     * have the same functionality, but they perform different aggregate
     * functions.
     *
     * If this methods are called without any arguments, they will simple
     * perform the specified aggregate function and return the value. This
     * will break the jQuery chain.
     *
     * However, if you invoke the method with any arguments then a jQuery
     * object is returned, which leaves the chain intact.
     *
     *
     * jQuery.fn.sum()
     * returns Number - the sum of all fields
     *
     * jQuery.fn.avg()
     * returns Number - the avg of all fields
     *
     * jQuery.fn.min()
     * returns Number - the minimum value in the field
     *
     * jQuery.fn.max()
     * returns Number - the maximum value in the field
     *
     * Examples:
     * $("input[name='price']").sum();
     * > This would return the sum of all the fields named price
     *
     * $("input[name='price1'], input[name='price2'], input[name='price3']").sum();
     * > This would return the sum of all the fields named price1, price2 or price3
     *
     * $("input[name^=sum]").sum("keyup", "#totalSum");
     * > This would update the element with the id "totalSum" with the sum of all the
     * > fields whose name started with "sum" anytime the keyup event is triggered on
     * > those field.
     *
     * NOTE: The syntax above is valid for any of the aggregate functions
     *
     */
    $.each(["sum", "avg", "min", "max"], function (i, method){
        $.fn[method] = function (bind, selector){
            // if no arguments, then return the result of the aggregate function
            if( arguments.length == 0 )
                return math[method](this.parseNumber());

            // if the selector is an options object, get the options
            var bSelOpt = selector && (selector.constructor == Object) && !(selector instanceof jQuery);

            // configure the options for this method
            var opt = bind && bind.constructor == Object ? bind : {
                bind: bind || "keyup"
                , selector: (!bSelOpt) ? selector : null
                , oncalc: null
            };

            // if the selector is an options object, extend	the options
            if( bSelOpt ) opt = jQuery.extend(opt, selector);

            // if the selector exists, make sure it's a jQuery object
            if( !!opt.selector ) opt.selector = $(opt.selector);

            var self = this
                , sMethod
                , doCalc = function (){
                    // preform the aggregate function
                    var value = math[method](self.parseNumber(opt));
                    // check to make sure we have a selector
                    if( !!opt.selector ){
                        // determine how to set the value for the selector
                        sMethod = (opt.selector.is(":input") ? (defaults.useFieldPlugin ? "setValue" : "val") : "text");
                        // update the value
                        opt.selector[sMethod](value.toString());
                    }
                    // if there's a callback, run it now
                    if( jQuery.isFunction(opt.oncalc) ) opt.oncalc.apply(self, [value, opt]);
                };

            // perform the aggregate function now, to ensure init values are updated
            doCalc();

            // bind the doCalc function to run each time a key is pressed
            return self.bind(opt.bind, doCalc);
        }
    });

    /*
     * Mathmatical functions
     */
    var math = {
        // sum an array
        sum: function (a){
            var total = 0, precision = 0;

            // loop through the value and total them
            $.each(a, function (i, v){
                // check for decimals and check the precision
                var p = v.toString().match(/\.\d+$/gi), len = (p) ? p[0].length-1 : 0;
                // track the highest level of precision
                if( len > precision ) precision = len;
                // we add 0 to the value to ensure we get a numberic value
                total += v;
            });

            // fix any the precision errors
            if( precision ) total = Number(total.toFixed(precision));

            // return the values as a comma-delimited string
            return total;
        },
        // average an array
        avg: function (a){
            // return the values as a comma-delimited string
            return math.sum(a)/a.length;
        },
        // lowest number in array
        min: function (a){
            return Math.min.apply(Math, a);
        },
        // highest number in array
        max: function (a){
            return Math.max.apply(Math, a);
        }
    };


})(jQuery);

// plugin end
$(document).ready(function() {
    recalc();
    function recalc(){
        $("[id^=total_item]").calc(
            // the equation to use for the calculation
            "qty * price",
            // define the variables used in the equation, these can be a jQuery object
            {
                qty: $("[id^=qty_item_]"),
                price: $("[id^=price_item_]")
            },
            // define the formatting callback, the results of the calculation are passed to this function
            function (s){
                // return the number as a dollar amount
                return s.toFixed(2);
            },
            // define the finish callback, this runs after the calculation has been complete
            function ($this){
                // sum the total of the $("[id^=total_item]") selector
                var sum = $this.sum();

                $("#totalSum").text(
                    // round the results to 2 digits
                    sum.toFixed(2)
                );
            }
        );
    }

    $( ".p" ).keyup(function() {
       recalc();
    });

 //   $(".p").sum("keyup", "#totalSum");






});



// plugin

