<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

$config['day_type'] = 'long';
$config['show_next_prev'] = TRUE;
$config['next_prev_url']   = site_url().'/events/show_calendar';
$config['template'] = '
    {table_open}
           <table class="calendar">
    {/table_open}
      
    {week_day_cell}
           <th class="day_header">{week_day}</th>
    {/week_day_cell}
    
    {cal_row_start}
              <tr class="days">
    {/cal_row_start}
    
    {cal_cell_start}
              <td class="day">
    {/cal_cell_start}
    
    {cal_cell_content}
                <div class="day_num">&nbsp; <span class="day_listing">{day}</span>&nbsp;</div>
                <div class="content">{content} <p></p></div>
    {/cal_cell_content}
    
    {cal_cell_content_today}
                 <div class="today">
                   <span class="day_listing">{day}</span> {content}
                 </div>
    {/cal_cell_content_today}
    
    {cal_cell_no_content}
               <span class="day_listing">{day}</span>&nbsp;
    {/cal_cell_no_content}
    
    {cal_cell_no_content_today}
               <div class="today">
                 <span class="day_listing">{day}</span>
               </div>
    {/cal_cell_no_content_today}';

