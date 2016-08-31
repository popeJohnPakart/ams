@extends('layouts.master')
@section('contents')
{!!HTML::style('assets/css_2/admin.css')!!}

<div class="container">
 <div class="row">
               <h3>View Reports</h3>
    <table class="tg">
 <tr>
    <th class="tg-9vto">Report Type</th>
    <th class="tg-031e">Report</th>
    <th class="tg-ejgj">Apartment ID</th>
    <th class="tg-ejgj">Apartment Block</th>
    <th class="tg-ejgj">Choose An Action</th>
  </tr>
  <tr>
  @foreach($allReports as $report)
    <td class="tg-z2zr">{!! $report->report_type !!}</td>
    <td class="tg-z2zr">{!! $report->report !!}</td>
    <td class="tg-j2zy">{!! $report->apartment_id !!}</td>
    <td class="tg-j2zy">{!! $report->apt_block !!}</td>
    <td class="tg-j2zy">
    <div class="pad">
    <a href="{{ URL::to('/deleteReport/'.$report->id) }}"><button class="btn btn-primary ">Mark as Done</button></a> 
    </div>
    </td>
  </tr> 
  @endforeach
</table>
</div>     
</div>
