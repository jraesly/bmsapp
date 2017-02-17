<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Invoice</title>
		<link rel="stylesheet" href="../assets/lib/invoicepdf/style.css">
		<link rel="license" href="http://www.opensource.org/licenses/mit-license/">
	</head>
	<body>
		<header>
			<h1>Invoice</h1>
			<address contenteditable>
				<p>Jonathan Neal</p>
				<p>101 E. Chapman Ave<br>Orange, CA 92866</p>
				<p>(800) 555-1234</p>
			</address>
			<span><img alt="" src="../assets/uploads/logo.png"></span>
		</header>
		<article>
			<h1>Recipient</h1>
			<address contenteditable>
				<p>Some Company<br>c/o Some Guy</p>
			</address>
			<table class="meta">
				<tr>
					<th><span contenteditable>Invoice #</span></th>
					<td><span contenteditable>101138</span></td>
				</tr>
				<tr>
					<th><span contenteditable>Date</span></th>
					<td><span contenteditable>January 1, 2012</span></td>
				</tr>
				<tr>
					<th><span contenteditable>Amount Due</span></th>
					<td><span id="prefix" contenteditable>$</span><span>600.00</span></td>
				</tr>
			</table>
			<table class="inventory">
				<thead>
					<tr>
						<th width="7%">S/L</th>
						<th width="75%">Description Rateuantity</th>
						<th width="18%">Price</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1</td>
						<td>Experience Review$ 150.004</td>
						<td>$ 600.00</td>
					</tr>
				</tbody>
			</table>
			<table class="balance">
				<tr>
					<th>Total</th>
					<td>$ 600.00</td>
				</tr>
				<tr>
					<th>Amount Paid</th>
					<td>$ 0.00</td>
				</tr>
				<tr>
					<th>Balance Due</th>
					<td>$ 600.00</td>
				</tr>
			</table>
		</article>
		<aside>
			<h1>Additional Notes</h1>
			<div>
				<p>A finance charge of 1.5% will be made on unpaid balances after 30 days.</p>
			</div>
		</aside>
	</body>
</html>