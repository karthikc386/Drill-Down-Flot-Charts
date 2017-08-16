<?php
/**
* FlotChartsController File Doc Comment
* PHP version 7
*
* @category FlotChartsController
* @package  App\Http\Controllers\FlotChartsController
* @author   Karthik Chakravarthi <karthikc386@gmail.com>
*/
namespace App\Http\Controllers;

class FlotChartsController extends Controller
{

    public function prepareGraphData()
    {

    
        $keys = array('I_Sem','II_Sem','III_Sem','IV_Sem','V_Sem','VI_Sem','VII_Sem','VIII_Sem','IX_Sem','X_Sem');
        $values = array_map(function() { return rand(50,90); }, $keys);

        for($i =0;$i< count($keys);$i++)
        {
            $first_chart_data[] = array($keys[$i], $values[$i]);
        }

        $second_chart_data = [];
        
        for($i =0;$i< count($keys);$i++)
        {
            $keys = array('Subject-1','Subject-2','Subject-3','Subject-4','Subject-5','Subject-6');
            $values = array_map(function() { return rand(60,80); }, $keys);

            $sfirst_chart_data = array_combine($keys, $values);
            $second_chart_data[$first_chart_data[$i][0]] = array_combine($keys,$values);
        }

        //Data the array data format that you need to pass
        /*
            print_r($first_chart_data);
            print_r($second_chart_data);
            die;
        */
        return ['chat_data1'=>$first_chart_data,'chat_data2'=>$second_chart_data];
    }


    public function getbarChart()
    {
        $response_graphdata = $this->prepareGraphData();

        return view('flotCharts.bar')
        ->with('group_data_chart1', json_encode($response_graphdata['chat_data1']))
        ->with('group_data_chart2', json_encode($response_graphdata['chat_data2']));        
    }    


    public function getPieChart()
    {
        $response_graphdata = $this->prepareGraphData();

        return view('flotCharts.pie')
        ->with('group_data_chart1', json_encode($response_graphdata['chat_data1']))
        ->with('group_data_chart2', json_encode($response_graphdata['chat_data2']));    
    }    

}
