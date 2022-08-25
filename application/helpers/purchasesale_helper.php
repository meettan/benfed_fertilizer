<?php

if (!function_exists('get_purchase')) {
    function get_purchase($frfDate, $toDate, $branch, $hoFlag, $state){
        $ci = &get_instance();
        $ci->load->database();
        if ($hoFlag == 'Y') {
            if ($state == 'S') {
                $data = "select sum(qty) qty,unit
                from   td_purchase
                where  trans_dt between '" . $frfDate . "' and '" . $toDate . "'
                and    unit in(1,2,4,6)
                group by unit";

                $resultData = $ci->db->query($data)->result();

                $total_qty=0.00;    
                        if(!empty($resultData)){                                     //Solid stock converting all units in MT
                        foreach ($resultData as $ho_purchase_daysldkey) {
                          if($ho_purchase_daysldkey->unit==1){
                            $total_qty=$total_qty+$ho_purchase_daysldkey->qty;
                          }elseif($ho_purchase_daysldkey->unit==2){
                            $Qty2=$ho_purchase_daysldkey->qty/1000;
                            $total_qty=$total_qty+$Qty2;
                          }elseif($ho_purchase_daysldkey->unit==4){
                            $Qty4=$ho_purchase_daysldkey->qty/10;
                            $total_qty=$total_qty+$Qty4;
                          }elseif($ho_purchase_daysldkey->unit==6){
                            $Qty6=$ho_purchase_daysldkey->qty/1000000;
                            $total_qty=$total_qty+$Qty6;
                          }
                        }
                    }

                return $total_qty;
            }
        }
    }
}
