<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bill</title>
    {!!HTML::style('assets/css_2/style.css')!!}

  </head>
  <body>
         {!!Form::open(['url'=>'issueBill'])!!}
    <main>

      <h1  class="clearfix"><small><span>Due Date</span>  {!!Form::label('due_date',$value=$tenant->due_date,['class'=>'form-control','readonly'=>'true'])!!}  <br /></small> Invoice for Tenant</h1>
      <table>
        <thead>
          <tr>
            <th class="service">SERVICE</th>
            <th class="desc">DESCRIPTION</th>
            <th>DUE</th>
          </tr> 
        </thead>
        <tbody>
          <tr>
            <td class="service">Payment for Rent</td>
            <td class="desc">Provide a payment for a unit a tenant is staying</td>
            <td class="total">{!!Form::label('lease',$value=$tenant->lease,['class'=>'form-control','readonly'=>'true'])!!}</td>
          </tr>
          <tr>
            <td class="service">Additional Expense</td>
            <td class="desc">Maintenance Expense for every unit</td>
            <td class="total">{!!Form::label('expense',$tenant->getExpense(),['class'=>'form-control','readonly'=>'true'])!!}</td>
          </tr>

          <tr>
            <td colspan="4" class="grand total">GRAND TOTAL</td>
            <td class="grand total">{!!Form::label('lease',$tenant->addtotal($tenant->lease),['class'=>'form-control','readonly'=>'true'])!!}</td>
          </tr>
        </tbody>
      </table>
      <div id="details" class="clearfix">
        <div id="project">
          <div class="arrow"><div class="inner-arrow"><span>TRANSACTION</span> invoice</div></div>
          <div class="arrow"><div class="inner-arrow"><span>CLIENT</span>{!!Form::label('lease',$value=$tenant->tenant_name,['class'=>'form-control','readonly'=>'true'])!!}</div></div>
          <div class="arrow"><div class="inner-arrow"><span>PHONE</span>{!!Form::label('lease',$value=$tenant->phone,['class'=>'form-control','readonly'=>'true'])!!}</div></div>
          <div class="arrow"><div class="inner-arrow"><span>EMAIL</span> {!!Form::label('email',$value=$tenant->email,['class'=>'form-control','readonly'=>'true'])!!}</div></div>
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
        <h3>Press Ctrl+P to print!</h3>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
     {!!Form::close()!!}
  </body>
</html>