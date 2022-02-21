@php
use App\Models\SettingModel ;
$model = new SettingModel();
// $itemFooter = $model->getItem($params['type'] == 'general');
$itemFooter   = $model->listItems(null, ['task'   => 'news-list-items-page']);
@endphp

<div class="our-history-area pt-text-3">
   <div class="container">
       <div class="row">
           <!--Section Title Start-->
           <div class="col-12">
               <div class="section-title text-center mb-30">
                   <span class="section-title-1">A little Story About Us</span>
                   <h2 class="section-title-large">Our History</h2>
               </div>
           </div>
           <!--Section Title End-->
       </div>
       <div class="row">
           <div class="col-lg-8 ml-auto mr-auto">
               <div class="history-area-content pb-0 mb-0 border-0 text-center">
                  {!!$itemFooter['story']!!}
               </div>
           </div>
       </div>
   </div>
</div>