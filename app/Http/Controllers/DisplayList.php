<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DisplayList extends Controller
{
    public function display(int $id)
    {
        if($id < 1  || !is_int($id))
        {
            return redirect("/1");
        }

        if($id == 1)
        {
            $entries = 0;
        }
        else
        {
            $entries = $id*10 - 10;
        }

        $fetch = DB::table('files')->orderBy('id','desc')->skip($entries)->take(10)->get();

        if($fetch == "[]")
        {
            $response = "No data available!";
            $pages = '';
        }
        else
        {
            $response = "<center><h3>Your Repository</h3></center><table class='table tbl-striped'><tr><th>File Name</th><th>File Type</th></tr>";

            foreach($fetch as $getdata_RSLT)
            {
                if($getdata_RSLT->type == "image/png" ||  $getdata_RSLT->type == "image/jpeg" || $getdata_RSLT->type == "image/gif")
                {
                    $response .= "<tr><td><a href='Repos/".$getdata_RSLT->name."' data-lightbox=\"images\" data-title=\"$getdata_RSLT->name\">".$getdata_RSLT->name."</a></td><td>".$getdata_RSLT->type."</td></tr>";
                }
                elseif($getdata_RSLT->type == "application/msword" || $getdata_RSLT->type == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")
                {
                    $response .= "<tr><td><a href='Repos/".$getdata_RSLT->name."' download>".$getdata_RSLT->name."</a></td><td>".$getdata_RSLT->type."</td></tr>";
                }
                else
                {
                    $response .= "<tr><td><a href='Repos/".$getdata_RSLT->name."' target = '_blank'>".$getdata_RSLT->name."</a></td><td>".$getdata_RSLT->type."</td></tr>";
                }
            }
            $response .= "</table>";

            $fetch2 =  DB::table('files')->count();
            $numPages = $fetch2 / 10;
            if(!is_int($numPages))
            {
                $numPages = floor($numPages) + 1;
            }

            $pages = "<center><ul class='pagination'>";
            for($i = 1; $i <= $numPages; $i++)
            {
                if($i == $id)
                {
                    $pages .= "<li class='active'><a href='/".$i."'</a>".$i."</li>";
                }
                else
                {
                    $pages .= "<li><a href='/".$i."'</a>".$i."</li>";
                }
            }
            $pages .= "</ul></center>";
        }
        return view("welcome",['response'=>$response ,'pages'=>$pages]);
    }
}
