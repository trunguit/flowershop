<?php

namespace App\Http\Controllers\Admin;
use App\Helpers\Template;
use App\Models\CartModel as MainModel;
use App\Http\Requests\CartRequest as MainRequest;
use PDF;
class CartController extends AdminController
{
    public function __construct()
    {
        $this->pathViewController = 'admin.pages.cart.';
        $this->controllerName = 'cart';
        $this->model = new MainModel();
        $this->params["pagination"]["totalItemsPerPage"] = 5;
        parent::__construct();
    }
    public function getdata()
    {
     $customer_data = DB::table('tbl_customer')
         ->limit(10)
         ->get();
     return $customer_data;
    }
    public function pdf(MainRequest $request)
    {
        $params['id'] = $request->id;
       
        $cart_data = $this->model->getItem($params, ['task'  => 'get-item']);
      $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($this->convert_customer_data_to_html($cart_data));
     return $pdf->stream();
    }

    public function convert_customer_data_to_html($cart_data)
    {
    
    
     $output = '
     <html lang="en">
     <head>
     <meta charset="UTF-8">
     <title>Aloha!</title>
     
     <style type="text/css">
         * {
             font-family: DejaVu Sans,Verdana, Arial, sans-serif;
         }
         table{
             font-size: x-small;
         }
         tfoot tr td{
             font-weight: bold;
             font-size: x-small;
         }
         .gray {
             background-color: lightgray
         }
     </style>
     
     </head>
     <body>
     
       <table width="100%">
         <tr>
             <td valign="top"><img src="'.asset('images/logo/logo.png').'" alt="" width="150"/></td>
             <td align="right">
                 <h3>Flosun</h3>
                 <pre>
                     Company Flosun
                     69/8 đường 120 phường Tân Phú Quận 9
                     0339775456
                 </pre>
             </td>
         </tr>
     
       </table>
     
       <table width="100%">
         <tr>
             <td><strong>Tên khách hàng:</strong>'.$cart_data['username'].'</br></td>
             <td><strong>Địa chỉ:</strong>'.$cart_data['address'].'</td><br />
             <td><strong>Số điện thoại:</strong>'.$cart_data['phone'].'</td>
            
         </tr>
     
       </table>
     
       <br/>
     
       <table width="100%">
         <thead style="background-color: lightgray;">
           <tr>
             <th>#</th>
             <th>Tên sản phẩm</th>
             <th>Số lượng</th>
             <th>Giá </th>
             <th>Tổng tiền </th>
           </tr>
         </thead>
         <tbody>';
         $products = json_decode($cart_data['products'],true);
         foreach ($products as $key => $value) {
             $stt = $key + 1;
             $price = Template::formatMoney($value['price']);
             $total = Template::formatMoney($value['total']);
             $output.='<tr>
             <th scope="row">'.$stt.'</th>
             <td>'.$value['name'].'</td>
             <td align="right">'.$value['qty'].'</td>
             <td align="right">'.$price.'</td>
             <td align="right">'.$total.'</td>
           </tr>';
         }
         $output.=' </tbody>
     
         <tfoot>
             <tr>
                 <td colspan="3"></td>
                 <td align="right">Tiền ship</td>
                 <td align="right">'.Template::formatMoney($cart_data['shiping_price']).'</td>
             </tr>
             <tr>
                <td colspan="3"></td>
                <td align="right">Tiền khuyến mãi</td>
                <td align="right">'.Template::formatMoney($cart_data['coupon_price']).'</td>
             </tr>
             <tr>
                 <td colspan="3"></td>
                 <td align="right">Tổng cộng</td>
                 <td align="right" class="gray">'.Template::formatMoney($cart_data['total_price']).'</td>
             </tr>
         </tfoot>
       </table>
     
     </body>
     </html>';
        
     return $output;
    }
}
    
   
