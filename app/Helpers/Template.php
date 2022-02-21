<?php 
namespace App\Helpers;

use App\Models\CategoryModel;
use Config;

class Template {
    public static function formatMoney($priceFloat) {
        $symbol = 'đ';
        $symbol_thousand = '.';
        $decimal_place = 0;
        $price = number_format($priceFloat, $decimal_place, '', $symbol_thousand);
        return $price.$symbol;
        }
    public static function createinput($type, $id, $name, $value, $class)
    {
        $xhtml = sprintf('<input type="%s" id="%s" name="%s" value="%s" class="%s"  >', $type, $id, $name, $value, $class);
        return $xhtml;
    }
    public static function showItemInputOrder($name, $id, $value)
    {
        $xhtml = sprintf(
            '<input type="number" class="form-control input-ordering input-list-admin" name="%s[%s]" data-id="%s" value="%s" min="1"', $name, $id, $id, $value);
        return $xhtml;
    }

    
    public static function showItemThumbUpload($thumbName, $thumbAlt)
    {
        $xhtml = sprintf(
            
            '<img src="%s" alt="%s" class="zvn-thumb">', asset('images/product/'.$thumbName), $thumbAlt);
        return $xhtml;
    }
    public static function nameCoupon($name){ 
        if($name == 'percent'){
            $xhtml = 'Phần trăm' ;
        }else{
            $xhtml = 'Tiền mặt';
        }
        return $xhtml ;
    }
    public static function valueCoupon($name , $value){
        if($name == 'percent'){
            $xhtml = $value . "%" ;
        }else{
            $xhtml = number_format($value) . " VNĐ" ;
        }
        return $xhtml ;
    }

    public static function showItemButton($controllerName, $id, $statusValue, $type)
    {
        $tmplStatus = Config::get('zvn.template.' . $type);
        $statusValue = array_key_exists($statusValue, $tmplStatus) ? $statusValue : 'default';
        $currentTemplateStatus = $tmplStatus[$statusValue];
        $link = route($controllerName . '/status', ['status' => $statusValue, 'id' => $id]);

        $xhtml = sprintf(
            '<button type="button" data-link="%s" class="btn btn-round %s-ajax %s">%s</button>', $link, $type, $currentTemplateStatus['class'], $currentTemplateStatus['name']);
        return $xhtml;
    }

    /**
     * Render button sort ordering (Nested Set Model)
     * @param $prefix
     * @param $arrElms
     * @param $idCurrent
     * @param null $option
     * @return string
     */
    public static function showBtnOrdering($prefix, $arrElms, $idCurrent, $option = null)
    {
        $arrParamsRouter = [
            'menuLanding' => [
                'up' => ['type' => 'up', 'id' => $idCurrent],
                'down' => ['type' => 'down', 'id' => $idCurrent]
            ],
            'cateNews' => [
                'up' => ['type' => 'up', 'id' => $idCurrent],
                'down' => ['type' => 'down', 'id' => $idCurrent]
            ],
            'cateApplication' => [
                'up' => ['type' => 'up', 'id' => $idCurrent],
                'down' => ['type' => 'down', 'id' => $idCurrent]
            ],
            'cateProduct' => [
                'up' => ['type' => 'up', 'id' => $idCurrent],
                'down' => ['type' => 'down', 'id' => $idCurrent]
            ],
            'menuHeader' => [
                'up' => ['type' => 'up', 'id' => $idCurrent],
                'down' => ['type' => 'down', 'id' => $idCurrent]
            ],
            'menuMain' => [
                'up' => ['type' => 'up', 'id' => $idCurrent],
                'down' => ['type' => 'down', 'id' => $idCurrent]
            ],
            'menuFooter' => [
                'up' => ['type' => 'up', 'id' => $idCurrent],
                'down' => ['type' => 'down', 'id' => $idCurrent]
            ],
            'default' => [
                'up' => ['type' => 'up', 'id' => $idCurrent],
                'down' => ['type' => 'down', 'id' => $idCurrent]
            ]
        ];

        $prefix = !empty($prefix) ? $prefix : 'default';

        if ($option['task'] == 'ordering-menu') {
            $idParent = $option['id_parent'];
            $siblings = self::getSiblingsAndSelfByParent($arrElms, $idParent);
            $elmMin = reset($siblings);
            $elmMax = end($siblings);
            $idMin = $elmMin['id'];
            $idMax = $elmMax['id'];
            $url_up = route($prefix . '/ordering', $arrParamsRouter[$prefix]['up']);
            $url_down = route($prefix . '/ordering', $arrParamsRouter[$prefix]['down']);
        }

        if ($option['task'] == 'ordering-content') {
            $elmMin = reset($arrElms);
            $elmMax = end($arrElms);
            $idMin = $elmMin['id'];
            $idMax = $elmMax['id'];
            $id_menu = $elmMin['id_menu'];
            $url_up = route($prefix . '/ordering', array_merge($arrParamsRouter[$prefix]['up'], ['id_menu' => $id_menu]));
            $url_down = route($prefix . '/ordering', array_merge($arrParamsRouter[$prefix]['down'], ['id_menu' => $id_menu]));
        }

        switch ($idCurrent) {
            case $idMin:
                $xhtml = '<a href="' . $url_down . '" class="btn btn-info"><i class="fa fa-long-arrow-down"></i></a>';
                break;
            case $idMax:
                $xhtml = '<a href="' . $url_up . '" class="btn btn-info"><i class="fa fa-long-arrow-up"></i></a>';
                break;
            default:
                $xhtml = '<a href="' . $url_down . '" class="btn btn-info"><i class="fa fa-long-arrow-down"></i></a>';
                $xhtml .= '<a href="' . $url_up . '" class="btn btn-info"><i class="fa fa-long-arrow-up"></i></a>';
                break;
        }

        return $xhtml;
    }

    /**
     * getSiblingsAndSelfByParent function
     * @param $arrElms
     * @param $idParent
     * @return array
     */
    public static function getSiblingsAndSelfByParent($arrElms, $idParent)
    {
        $arrSiblings = [];
        $arrElms = $arrElms->toArray()['data'];
        foreach ($arrElms as $k => $arrElm) {
            if ($arrElm['parent_id'] == $idParent) {
                array_push($arrSiblings, $arrElms[$k]);
            }
        }
        uasort($arrSiblings, function ($a, $b) {
            if ($a['_lft'] == $b['_lft']) {
                return 0;
            }
            return ($a['_lft'] < $b['_lft']) ? -1 : 1; //asc
        });

        return $arrSiblings;
    }

    /**
     * Show content sub charset
     * @param $content
     * @param $length
     * @param string $prefix
     * @return string
     */
    public static function substrContent($content, $length, $prefix = '...')
    {
        $prefix = ($length == 0) ? '' : $prefix;
        $content = str_replace(['<p>', '</p>'], '', $content);
        return preg_replace('/\s+?(\S+)?$/', '', substr($content, 0, $length)) . $prefix;
    }

    public static function showSelectFilter($field_name, $values, $selected = 'default', $showConfig = true)
    {
        $xhtml = sprintf('<select name="select_filter" class="form-control" data-field="%s">', $field_name);
        foreach ($values as $key => $value) {
            $xhtmlSelected = '';
            if ((string)$key === $selected) {
                $xhtmlSelected = 'selected="selected"';
            }
            if ($showConfig)
                $xhtml .= sprintf('<option value="%s" %s>%s</option>', $key, $xhtmlSelected, $value['name']);
            else
                $xhtml .= sprintf('<option value="%s" %s>%s</option>', $key, $xhtmlSelected, $value);
        }
        $xhtml .= '</select>';

        return $xhtml;
    }
    public static function showSelectSort( $values, $selected = 'default', $showConfig = true)
    {
        $xhtml = '<select name="select_sort" class="form-control" data-field="">';
        foreach ($values as $key => $value) {
            $xhtmlSelected = '';
            if ((string)$key === $selected) {
                $xhtmlSelected = 'selected="selected"';
            }
            if ($showConfig)
                $xhtml .= sprintf('<option value="%s" %s>%s</option>', $key, $xhtmlSelected, $value['name']);
            else
                $xhtml .= sprintf('<option value="%s" %s>%s</option>', $key, $xhtmlSelected, $value);
        }
        $xhtml .= '</select>';

        return $xhtml;
    }
    public static function showButtonFilter ($controllerName, $itemsStatusCount, $currentFilterStatus, $paramsSearch) { // $currentFilterStatus active inactive all
        $xhtml = null;
        $tmplStatus = Config::get('zvn.template.status');

        if (count($itemsStatusCount) > 0) {
            array_unshift($itemsStatusCount , [
                'count'   => array_sum(array_column($itemsStatusCount, 'count')),
                'status'  => 'all'
            ]);

            foreach ($itemsStatusCount as $item) {  // $item = [count,status]
                $statusValue = $item['status'];  // active inactive block
                $statusValue = array_key_exists($statusValue, $tmplStatus ) ? $statusValue : 'default';

                $currentTemplateStatus = $tmplStatus[$statusValue]; // $value['status'] inactive block active
                $link = route($controllerName) . "?filter_status=" .  $statusValue;

                if($paramsSearch['value'] !== ''){
                    $link .= "&search_field=" . $paramsSearch['field'] . "&search_value=" .  $paramsSearch['value'];
                }

                $class  = ($currentFilterStatus == $statusValue) ? 'btn-danger' : 'btn-info';
                $xhtml  .= sprintf('<a href="%s" type="button" class="btn %s">
                                    %s <span class="badge bg-white">%s</span>
                                </a>', $link, $class, $currentTemplateStatus['name'], $item['count']);
            }
        }

        return $xhtml;
    }
    public static function showButtonFilterCart ($controllerName, $itemsStatusCount, $currentFilterStatus, $paramsSearch) { // $currentFilterStatus active inactive all
        $xhtml = null;
        $tmplStatus = Config::get('zvn.status');

        if (count($itemsStatusCount) > 0) {
            array_unshift($itemsStatusCount , [
                'count'   => array_sum(array_column($itemsStatusCount, 'count')),
                'status'  => 'all'
            ]);

            foreach ($itemsStatusCount as $item) {  // $item = [count,status]
                $statusValue = $item['status'];  // active inactive block
                $statusValue = array_key_exists($statusValue, $tmplStatus ) ? $statusValue : 'default';

                $currentTemplateStatus = $tmplStatus[$statusValue]; // $value['status'] inactive block active
                $link = route($controllerName) . "?filter_status=" .  $statusValue;

                if($paramsSearch['value'] !== ''){
                    $link .= "&search_field=" . $paramsSearch['field'] . "&search_value=" .  $paramsSearch['value'];
                }

                $class  = ($currentFilterStatus == $statusValue) ? 'btn-danger' : 'btn-info';
                $xhtml  .= sprintf('<a href="%s" type="button" class="btn %s">
                                    %s <span class="badge bg-white">%s</span>
                                </a>', $link, $class, $currentTemplateStatus['name'], $item['count']);
            }
        }

        return $xhtml;
    }
    public static function showAreaSearch ($controllerName, $paramsSearch) { 
        $xhtml = null;
        $tmplField         = Config::get('zvn.template.search');
        $fieldInController = Config::get('zvn.config.search');

        $controllerName = (array_key_exists($controllerName, $fieldInController)) ? $controllerName : 'default';
        $xhtmlField = null;

        foreach($fieldInController[$controllerName] as $field)  {// all id
            $xhtmlField .= sprintf('<li><a href="#" class="select-field" data-field="%s">%s</a></li>', $field, $tmplField[$field]['name']);
        }
       
        $searchField = (in_array($paramsSearch['field'],  $fieldInController[$controllerName] )) ? $paramsSearch['field'] : "all";

        $xhtml = sprintf('
            <div class="input-group">
                <div class="input-group-btn">
                    <button type="button" class="btn btn-default dropdown-toggle btn-active-field" data-toggle="dropdown" aria-expanded="false">
                        %s <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                        %s
                    </ul>
                </div>
                <input type="text" name="search_value" value="%s" class="form-control" >
                <input type="hidden" name="search_field" value="%s">
                <span class="input-group-btn">
                    <button id="btn-clear-search" type="button" class="btn btn-success" style="margin-right: 0px">Xóa tìm kiếm</button>
                    <button id="btn-search" type="button" class="btn btn-primary">Tìm kiếm</button>
                </span>
            </div>', $tmplField[$searchField]['name'], $xhtmlField, $paramsSearch['value'], $searchField);
        return $xhtml;
    }

    public static function showItemHistory ($by, $time) {
        $xhtml = sprintf(
            '<p><i class="fa fa-user"></i> %s</p>
            <p><i class="fa fa-clock-o"></i> %s</p>', $by, date(Config::get('zvn.format.short_time'), strtotime($time)) );
        return $xhtml;
    }

    public static function showItemStatus ($controllerName, $id, $statusValue) {
        $tmplStatus = Config::get('zvn.template.status');
        $statusValue        = array_key_exists($statusValue, $tmplStatus ) ? $statusValue : 'default';
        $currentTemplateStatus = $tmplStatus[$statusValue];
        $link          = route($controllerName . '/status', ['status' => $statusValue, 'id' => $id]);

        $xhtml = sprintf(
            '<a href="%s" type="button" class="btn-status btn btn-round %s" data-class="%s">%s</a>', $link , $currentTemplateStatus['class'], $currentTemplateStatus['class'], $currentTemplateStatus['name']  );
        return $xhtml;
    }

    public static function showItemIsHome ($controllerName, $id, $isHomeValue) {
        $tmplIsHome = Config::get('zvn.template.is_home');
        $isHomeValue        = array_key_exists($isHomeValue, $tmplIsHome ) ? $isHomeValue : 'yes';
        $currentTemplateIsHome = $tmplIsHome[$isHomeValue];
        $link          = route($controllerName . '/isHome', ['is_home' => $isHomeValue, 'id' => $id]);

        $xhtml = sprintf(
            '<a href="%s" type="button" class="btn btn-round %s">%s</a>', $link , $currentTemplateIsHome['class'], $currentTemplateIsHome['name']  );
        return $xhtml;
    }

    public static function showItemSelect($controllerName, $id, $displayValue, $fieldName)
    {
       $link          = route($controllerName . '/' . $fieldName, [$fieldName => 'value_new', 'id' => $id]);
        
       $tmplDisplay = Config::get('zvn.template.' . $fieldName);
       $xhtml = sprintf('<select name="select_change_attr" data-url="%s" class="form-control select-ajax">', $link  );

        foreach ($tmplDisplay as $key => $value) {
           $xhtmlSelected = '';
           if ($key == $displayValue) $xhtmlSelected = 'selected="selected"';
            $xhtml .= sprintf('<option value="%s" %s>%s</option>', $key, $xhtmlSelected, $value['name']);
        }
        $xhtml .= '</select>';

        return $xhtml;
    }
    public static function showItemSelectCart($controllerName, $id, $displayValue, $fieldName)
    {
       $link          = route($controllerName . '/' . $fieldName, [$fieldName => 'value_new', 'id' => $id]);
        
       $tmplDisplay = Config::get('zvn.' . $fieldName);
       unset($tmplDisplay['all']);
       unset($tmplDisplay['default']);
       $xhtml = sprintf('<select name="select_change_attr" data-url="%s" class="form-control select-ajax">', $link  );

        foreach ($tmplDisplay as $key => $value) {
           $xhtmlSelected = '';
           if ($key == $displayValue) $xhtmlSelected = 'selected="selected"';
            $xhtml .= sprintf('<option value="%s" %s>%s</option>', $key, $xhtmlSelected, $value['name']);
        }
        $xhtml .= '</select>';

        return $xhtml;
    }
    public static function createSelectBox($arrValue, $keySelect = 'default', $attribute = '')
    {
       
      $linkAjax  = route('cart/ajaxShip',['id'=>'value_new']);
        $xhtml = '<select name="district" class="select-ajax myniceselect nice-select wide rounded-0" data-url="'.$linkAjax.'" '.$attribute.' >';
        foreach ($arrValue as $key => $value) {
            if ($key == $keySelect && is_numeric($keySelect)) {
                $xhtml .= '<option class="option-selected" selected="selected"  value = "' . $key . '">' . $value . '</option>';
            } else {
                $xhtml .= '<option   value = "' . $key . '">' . $value . '</option>';
            }
        }
        $xhtml .= '</select>';
        return $xhtml;
    }
    public static function showItemSelect2($controllerName, $id, $arrValue, $displayValue, $fieldName, $showConfig = true)
    {
        $link = route($controllerName . '/attribute', ['id' => $id]);

        $xhtml = sprintf('<select name="select_change_attr" data-url="%s" data-field="%s" class="form-control select-ajax">', $link, $fieldName);

        foreach ($arrValue as $key => $value) {
            $xhtmlSelected = '';
            if ($key == $displayValue) $xhtmlSelected = 'selected="selected"';
            if ($showConfig)
                $xhtml .= sprintf('<option value="%s" %s>%s</option>', $key, $xhtmlSelected, $value['name']);
            else
                $xhtml .= sprintf('<option value="%s" %s>%s</option>', $key, $xhtmlSelected, $value);
        }
        $xhtml .= '</select>';

        return $xhtml;
    }

    /**
     * Show button check config product
     * @param $controllerName
     * @param $id
     * @param $config
     * @param $statusValue
     * @return string
     */
    public static function showItemConfigProduct($controllerName, $id, $config, $statusValue)
    {
        $tmplStatus = Config::get('zvn.template.config')[$config];
        $statusValue = array_key_exists($statusValue, $tmplStatus) ? $statusValue : 'default';
        $currentTemplateStatus = $tmplStatus[$statusValue];
        $link = route($controllerName . '/config', ['config' => $config, 'value' => $statusValue, 'id' => $id]);

        $xhtml = sprintf(
            '<button type="button" data-link="%s" data-config="%s" class="btn btn-round config-ajax %s">%s</button>', $link, $config, $currentTemplateStatus['class'], $currentTemplateStatus['name']);
        return $xhtml;
    }

    public static function showItemThumb ($controllerName, $thumbName, $thumbAlt) {
        $xhtml = sprintf(
            '<img src="%s" alt="%s" class="zvn-thumb">', asset("images/$controllerName/$thumbName")  , $thumbAlt );
        return $xhtml;
    }

    public static function showButtonAction ($controllerName, $id) {
        $tmplButton   = Config::get('zvn.template.button');
        $buttonInArea = Config::get('zvn.config.button');

        $controllerName = (array_key_exists($controllerName, $buttonInArea)) ? $controllerName : "default";
        $listButtons    = $buttonInArea[$controllerName]; // ['edit', 'delete']

        $xhtml = '<div class="zvn-box-btn-filter">';

        foreach ($listButtons as $btn) {
            $currentButton = $tmplButton[$btn];

            $link = route($controllerName . $currentButton['route-name'], ['id' => $id] );
            $xhtml .= sprintf(
                '<a href="%s" type="button" class="btn btn-icon %s" data-toggle="tooltip" data-placement="top" 
                    data-original-title="%s">
                    <i class="fa %s"></i>
                </a>', $link, $currentButton['class'], $currentButton['title'], $currentButton['icon']);
        }

        $xhtml .= '</div>';

        return $xhtml;
    }

    public static function showDatetimeFrontend($dateTime)
    {
        return date_format(date_create($dateTime), Config::get('zvn.format.short_time'));
    }

    public static function showContent($content, $length, $prefix = '...')
    {
        $prefix = ($length == 0) ? '' : $prefix;
        $content = str_replace(['<p>', '</p>'], '', $content);
        return preg_replace('/\s+?(\S+)?$/', '', substr($content, 0, $length)) . $prefix;
    }

    public static function showBoxDashboard($box)
    {
        $result = sprintf('<div class="tile-stats">
                                <div class="icon"><i class="fa fa-comments-o"></i></div>
                                <div class="count">%s</div>
                                <h3>%s</h3>
                                <p><a href="%s">Xem chi tiết</a></p>
                            </div>', $box['name'],  $box['total'],  $box['link']);

        return $result;
    }

    public static function showItemOrdering($controllerName, $orderingValue, $id)
    {
        $link = route("$controllerName/ordering", ['ordering' => 'value_new', 'id' => $id]);
        $xhtml = sprintf('<input type="number" class="form-control ordering" id="ordering-%s" data-url="%s" value="%s" style="width: 60px">', $id, $link, $orderingValue);
        return $xhtml;
    }

    public static function showNestedSetName($name, $level)
    {
        $xhtml = str_repeat('|------ ', $level - 1);
        $xhtml .= sprintf('<span class="badge badge-danger p-1">%s</span> <strong>%s</strong>', $level, $name);
        return $xhtml;
    }

    public static function showNestedSetUpDown($controllerName, $id)
    {
        $upButton = sprintf('
        <a href="%s" type="button" class="btn btn-primary mb-0" data-toggle="tooltip" title="" data-original-title="Up">
            <i class="fa fa-long-arrow-up"></i>
        </a>', route("$controllerName/move", ['id' => $id, 'type' => 'up']));

        $downButton = sprintf('
        <a href="%s" type="button" class="btn btn-primary mb-0" data-toggle="tooltip" title="" data-original-title="Down">
            <i class="fa fa-long-arrow-down"></i>
        </a>', route("$controllerName/move", ['id' => $id, 'type' => 'down']));

        $node = CategoryModel::find($id);
        
        if (empty($node->getPrevSibling()) || empty($node->getPrevSibling()->parent_id)) $upButton = '';
        if (empty($node->getNextSibling())) $downButton = '';

        $xhtml = '
        <span style="width: 36px; display: inline-block">' . $upButton . '</span>
        <span style="width: 36px; display: inline-block">' . $downButton . '</span>
        ';

        return $xhtml;
    }

    public static function showNestedMenu($items)
    {
      $xhtml = '';
        foreach ($items as $item) {
            $link = URL::linkCategory($item['id'], $item['name']);
            if (count($item['children'])) {
                
                $xhtml .= sprintf('<a href="%s">%s <span><i class="ion-ios-arrow-right"></i></span></a><ul class="lavel-menu">', $link, $item['name']);

                Template::showNestedMenu($item['children']);

                $xhtml .= '</ul></li>';
            } else {
                $xhtml .= sprintf('<li><a href="%s">%s</a></li>', $link, $item['name']);
            }
        }
        return $xhtml;
    }
   
    public static function totalItem($arr = [])
    {
        $totalItem = 0;
        foreach ($arr as $key => $value) {
          $totalItem += $value['quantity'];
        }
        return $totalItem;
    }
    public static function totalPrice($arr = [])
    {
        $totalPrice = 0;
        foreach ($arr as $key => $value) {
          $totalPrice += $value['quantity'];
        }
        return $totalPrice;
    }
    public static function showNestedProductMenu($items)
    {
        $xhtml = '';
        foreach ($items as $item) {
            $link = URL::linkCateProduct($item['id'], $item['name']);
            if (count($item['children'])) {
                
                $xhtml .= sprintf('<a href="%s">%s <span><i class="ion-ios-arrow-right"></i></span></a><ul class="lavel-menu">', $link, $item['name']);

                Template::showNestedProductMenu($item['children']);

                $xhtml .= '</ul></li>';
            } else {
                $xhtml .= sprintf('<li><a href="%s">%s</a></li>', $link, $item['name']);
            }
        }
        return $xhtml;
    }
}