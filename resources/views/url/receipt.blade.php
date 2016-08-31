<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bill</title>
    <link rel="stylesheet" href="style.css" media="all" />
  </head>
  <body>
    <main>
      <h1  class="clearfix"><small><span>DATE OF Issue</span><br />{August 17, 2015}</small> Invoice for Tenant <small><span>DUE DATE</span><br />{-- September 17, 2015}</small></h1>
      <table>
        <thead>
          <tr>
            <th class="service">SERVICE</th>
            <th class="desc">DESCRIPTION</th>
            <th>PRICE</th>
          </tr> 
        </thead>
        <tbody>
          <tr>
            <td class="service">Payment for Rent</td>
            <td class="desc">Provide a payment for a unit a tenant is staying</td>
            <td class="unit">$40.00</td>
            <td class="total">$1,040.00</td>
          </tr>
          <tr>
            <td class="service">Additional Expenses</td>
            <td class="desc">Additional Maintenance Expenses</td>
            <td class="unit">$40.00</td>
            <td class="total">$3,200.00</td>
          </tr>
          <tr>
            <td colspan="4" class="sub">SUBTOTAL</td>
            <td class="sub total">$5,200.00</td>
          </tr>
          <tr>
            <td colspan="4">TAX 25%</td>
            <td class="total">$1,300.00</td>
          </tr>
          <tr>
            <td colspan="4" class="grand total">GRAND TOTAL</td>
            <td class="grand total">$6,500.00</td>
          </tr>
        </tbody>
      </table>
      <div id="details" class="clearfix">
        <div id="project">
          <div class="arrow"><div class="inner-arrow"><span>TRANSACTION</span> {}</div></div>
          <div class="arrow"><div class="inner-arrow"><span>CLIENT</span> {}</div></div>
          <div class="arrow"><div class="inner-arrow"><span>PHONE</span> {}</div></div>
          <div class="arrow"><div class="inner-arrow"><span>EMAIL</span> <a href="mailto:john@example.com">john@example.com</a></div></div>
        </div>
        <div id="company">
          <div class="arrow back"><div class="inner-arrow">AJ Constr. Co <span>Company <noframes></noframes></span></div></div>
          <div class="arrow back"><div class="inner-arrow">455 Foggy Heights, AZ 85004, US <span>ADDRESS</span></div></div>
          <div class="arrow back"><div class="inner-arrow">(602) 519-0450 <span>PHONE</span></div></div>
          <div class="arrow back"><div class="inner-arrow"><a href="mailto:company@example.com">company@example.com</a> <span>EMAIL</span></div></div>
        </div>
      </div>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>