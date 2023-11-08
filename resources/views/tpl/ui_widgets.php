<div class="bg-light lter b-b wrapper-md">
  <h1 class="m-n font-thin h3">Widgets</h1>
</div>
<div class="wrapper-md">
  <div class="row">
    <div class="col-md-4">
      <div class="panel b-a">
        <div class="panel-heading no-border bg-primary">          
          <span class="text-lt">The Restaurant</span>
        </div>
        <div class="item m-l-n-xxs m-r-n-xxs">
          <div ng-init="x = 3" class="top text-right padder m-t-xs w-full">
            <rating ng-model="x" max="5" state-on="'fa fa-star text-white'" state-off="'fa fa-star-o text-white'"></rating>
          </div>
          <div class="center text-center w-full" style="margin-top:-60px">
            <div ui-jq="easyPieChart" ui-refresh="x" ui-options="{
                percent: {{x*15}},
                lineWidth: 60,
                trackColor: 'rgba(255,255,255,0)',
                barColor: 'rgba(35,183,229,0.7)',
                scaleColor: false,
                size: 120,
                lineCap: 'butt',
                rotate: 0,
                animate: 1000
              }" class="inline">
            </div>
          </div>
          <div class="bottom wrapper bg-gd-dk text-white">            
            <div class="text-u-c h3 m-b-sm text-primary-lter">Coffee</div>
            <div>Restaurant</div>
            <div>9:00 am - 12:00 pm</div>
          </div>
          <img src="img/c0.jpg" class="img-full">
        </div>
        <div class="hbox text-center b-b b-light text-sm">          
          <a href class="col padder-v text-muted b-r b-light">
            <i class="icon-call-end block m-b-xs fa-2x"></i>
            <span>Call</span>
          </a>
          <a href class="col padder-v text-muted b-r b-light">
            <i class="icon-pointer block m-b-xs fa-2x"></i>
            <span>Location</span>
          </a>
          <a href class="col padder-v text-muted">
            <i class="icon-cursor block m-b-xs fa-2x"></i>
            <span>Direction</span>
          </a>
        </div>
        <div class="hbox text-center text-sm">          
          <a href class="col padder-v text-muted b-r b-light">
            <i class="icon-plus block m-b-xs fa-2x"></i>
            <span>Add a tip</span>
          </a>
          <a href class="col padder-v text-muted b-r b-light">
            <i class="icon-like block m-b-xs fa-2x"></i>
            <span>Like it</span>
          </a>
          <a href class="col padder-v text-muted">
            <i class="icon-link block m-b-xs fa-2x"></i>
            <span>Website</span>
          </a>
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <div class="row">
        <div class="col-sm-6">
          <div class="panel b-a">
            <div class="panel-heading bg-info dk no-border wrapper-lg">
              <button class="btn btn-sm btn-icon btn-rounded btn-info pull-right m-r"><i class="fa fa-phone"></i></button>
              <button class="btn btn-sm btn-icon btn-rounded btn-info m-l"><i class="fa fa-heart"></i></button>
            </div>
            <div class="text-center m-b clearfix">
              <div class="thumb-lg avatar m-t-n-xxl">
                <img src="img/a5.jpg" alt="..." class="b b-3x b-white">
                <div class="h4 font-thin m-t-sm">Jacobs Simon</div>
              </div>
            </div>
            <div class="padder-v b-t b-light bg-light lter row text-center no-gutter">
              <div class="col-xs-4">
                <div>Facebook</div>
                <div class="inline m-t-sm">
                  <div ui-jq="easyPieChart" ui-options="{
                      percent: 30,
                      lineWidth: 3,
                      trackColor: '{{app.color.light}}',
                      barColor: '{{app.color.primary}}',
                      scaleColor: false,
                      color: '#fff',
                      size: 65,
                      lineCap: 'butt',
                      rotate: 45,
                      animate: 1000
                    }">
                    <div>
                      <span class="step">30</span>%
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xs-4">
                <div>Twitter</div>
                <div class="inline m-t-sm">
                  <div ui-jq="easyPieChart" ui-options="{
                      percent: 50,
                      lineWidth: 3,
                      trackColor: '{{app.color.light}}',
                      barColor: '{{app.color.info}}',
                      scaleColor: false,
                      color: '#fff',
                      size: 65,
                      lineCap: 'butt',
                      rotate: 90,
                      animate: 1000
                    }">
                    <div>
                      <span class="step">50</span>%
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xs-4">
                <div>Linkin</div>
                <div class="inline m-t-sm">
                  <div ui-jq="easyPieChart" ui-options="{
                      percent: 20,
                      lineWidth: 3,
                      trackColor: '{{app.color.light}}',
                      barColor: '{{app.color.warning}}',
                      scaleColor: false,
                      color: '#fff',
                      size: 65,
                      lineCap: 'butt',
                      rotate: 180,
                      animate: 1000
                    }">
                    <div>
                      <span class="step">20</span>%
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="hbox text-center b-t b-light">          
              <a href class="col padder-v text-muted b-r b-light">
                <div class="h4">5032</div>
                <span>Posts</span>
              </a>
              <a href class="col padder-v text-muted">
                <div class="h4">689</div>
                <span>Photos</span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="panel no-border">
            <div class="panel-heading bg-primary lt">
              <div class="m-sm">
                <span class="pull-right"><i class="fa fa-caret-up text-warning text-lg"></i></span>
                <span class="h4 text-white">Member Stats</span>
              </div>              
              <div class="text-center m-t-md">
                  <div ui-jq="sparkline" ui-options="
                  [50.32,45.23,47.56,36.25,53.85,40.15,41.25,50.15,57.14,36.15,97.26,50.15,45.32,47.19,37.75,25.15,56.34,50.35,47.25,53.15], 
                  {type:'line', height:80, width: '100%', lineWidth:4, lineColor:'#fff', spotColor:'#fff', fillColor:'', highlightLineColor:'#fff', spotRadius:6, minSpotColor:'{{app.color.warning}}', maxSpotColor:'{{app.color.info}}'}
                  ">loading...</div>

                  <div ui-jq="sparkline" ui-options="[ 10,9,11,10,11,10,12,10,9,10,11,9,8 ], 
                  {type:'bar', height:60, barWidth:4, barSpacing:6, barColor:'{{app.color.primary}}'}
                  " class="sparkline inline m-t m-b-n-sm"></div>
              </div>
            </div>
            <div class="hbox bg-primary bg">
              <div class="col wrapper">
                <span>Customers</span>
                <div class="h1 text-info font-thin">12,790</div>
              </div>
              <div class="col wrapper bg-info">
                <span>VIP</span>
                <div class="h1 text-warning font-thin">2,560</div>
              </div>
            </div>
            <div class="panel-footer bg-light lter wrapper">
              <div class="row">
                <div class="col-xs-4">
                  <small class="text-muted block">Active</small>
                  <span class="text-md">1,500</span>
                </div>
                <div class="col-xs-4">
                  <small class="text-muted block">Inactive</small>
                  <span class="text-md">10,430</span>
                </div>
                <div class="col-xs-4">
                  <small class="text-muted block">Sleeping</small>
                  <span class="text-md">400</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-8">
      <div class="row">
        <div class="col-sm-6">
          <div class="panel panel-default">
            <div class="panel-heading">
              <div class="clearfix">
                <a href class="pull-left thumb-md avatar b-3x m-r">
                  <img src="img/a2.jpg" alt="...">
                </a>
                <div class="clear">
                  <div class="h3 m-t-xs m-b-xs">
                    John.Smith 
                    <i class="fa fa-circle text-success pull-right text-xs m-t-sm"></i>
                  </div>
                  <small class="text-muted">Art director</small>
                </div>
              </div>
            </div>
            <div class="list-group no-radius alt">
              <a class="list-group-item" href>
                <span class="badge bg-success">25</span>
                <i class="fa fa-comment fa-fw text-muted"></i> 
                Messages
              </a>
              <a class="list-group-item" href>
                <span class="badge bg-info">16</span>
                <i class="fa fa-envelope fa-fw text-muted"></i> 
                Inbox
              </a>
              <a class="list-group-item" href>
                <span class="badge bg-light">5</span>
                <i class="fa fa-eye fa-fw text-muted"></i> 
                Profile visits
              </a>
            </div>
          </div>
          <div class="panel panel-info">
            <div class="panel-body">
              <a href class="thumb pull-right m-l m-t-xs avatar">
                <img src="img/a4.jpg" alt="...">
                <i class="on md b-white bottom"></i>
              </a>
              <div class="clear">
                <a href class="text-info block m-b-xs">@Mike Mcalidek <i class="icon-twitter"></i></a>
                <a href class="btn btn-addon btn-sm btn-info m-t-xs"><i class="fa fa-eye"></i> Follow</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="panel panel-default">
            <a href class="text-muted m-t-sm m-l inline"  ng-click="data=[40, 40, 20]"><i class="icon-pie-chart"></i></a>
            <div class="text-center wrapper m-b-sm">              
              <div ui-refresh="data" ui-jq="sparkline" ui-options="
              [55, 30, 15], 
              {
                type:'pie', 
                height:126, 
                sliceColors:['{{app.color.primary}}','{{app.color.info}}','{{app.color.warning}}']
              }
              " class="sparkline inline"></div>
            </div>
            <ul class="list-group no-radius">
              <li class="list-group-item">
                <span class="pull-right">45,000</span>
                <span class="label bg-primary">1</span>
                .inc company
              </li>
              <li class="list-group-item">
                <span class="pull-right">23,200</span>
                <span class="label bg-info">2</span>
                Gamecorp
              </li>
              <li class="list-group-item">
                <span class="pull-right">21,000</span>
                <span class="label bg-warning">3</span>
                Starup
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="clearfix text-center m-t">
            <div class="inline">
              <div ui-jq="easyPieChart" ui-options="{
                    percent: 75,
                    lineWidth: 5,
                    trackColor: '{{app.color.light}}',
                    barColor: '{{app.color.info}}',
                    scaleColor: false,
                    color: '{{app.color.dark}}',
                    size: 134,
                    lineCap: 'butt',
                    rotate: -90,
                    animate: 1000
                  }">
                <div class="thumb-xl">
                  <img src="img/a8.jpg" class="img-circle" alt="...">
                </div>
              </div>
              <div class="h4 m-t m-b-xs">John.Smith</div>
              <small class="text-muted m-b">Art director</small>
            </div>                      
          </div>
        </div>
        <footer class="panel-footer bg-info text-center no-padder">
          <div class="row no-gutter">
            <div class="col-xs-4">
              <div class="wrapper">
                <span class="m-b-xs h3 block text-white">245</span>
                <small class="text-muted">Followers</small>
              </div>
            </div>
            <div class="col-xs-4 dk">
              <div class="wrapper">
                <span class="m-b-xs h3 block text-white">55</span>
                <small class="text-muted">Following</small>
              </div>
            </div>
            <div class="col-xs-4">
              <div class="wrapper">
                <span class="m-b-xs h3 block text-white">2,035</span>
                <small class="text-muted">Tweets</small>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-6">
      <!-- chat -->
      <div class="panel panel-default">
        <div class="panel-heading">Chat</div>
        <div class="panel-body">
          <div class="m-b">
            <a href class="pull-left thumb-sm avatar"><img src="img/a2.jpg" alt="..."></a>
            <div class="m-l-xxl">
              <div class="pos-rlt wrapper b b-light r r-2x">
                <span class="arrow left pull-up"></span>
                <p class="m-b-none">Hi John, What's up...</p>
              </div>
              <small class="text-muted"><i class="fa fa-ok text-success"></i> 2 minutes ago</small>
            </div>
          </div>
          <div class="m-b">
            <a href class="pull-right thumb-sm avatar"><img src="img/a3.jpg" class="img-circle" alt="..."></a>
            <div class="m-r-xxl">
              <div class="pos-rlt wrapper bg-primary r r-2x">
                <span class="arrow right pull-up arrow-primary"></span>
                <p class="m-b-none">Lorem ipsum dolor sit amet, conse <br>adipiscing eli...<br>:)</p>
              </div>
              <small class="text-muted">1 minutes ago</small>
            </div>
          </div>                          
        </div>
        <footer class="panel-footer">
          <!-- chat form -->
          <div>
            <a class="pull-left thumb-xs avatar"><img src="img/a3.jpg" class="img-circle" alt="..."></a>
            <form class="m-b-none m-l-xl">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Say something">
                <span class="input-group-btn">
                  <button class="btn btn-default" type="button">SEND</button>
                </span>
              </div>
            </form>
          </div>
        </footer>
      </div>
      <!-- /chat -->            
      <div class="panel panel-default">
        <div class="panel-heading">                    
          <span class="label bg-dark">15</span> News
        </div>
        <div class="panel-body" ui-jq="slimScroll" ui-options="{height:'250px', size:'8px'}">
          <div class="media">
            <span class="pull-left thumb-sm"><img src="img/a2.jpg" alt="..."></span>
            <div class="media-body">
              <div class="pull-right text-center text-muted">
                <strong class="h4">12:18</strong><br>
                <small class="label bg-light">pm</small>
              </div>
              <a href class="h4">Bootstrap 3 released</a>
              <small class="block"><a href class="">John Smith</a> <span class="label label-success">Circle</span></small>
              <small class="block m-t-sm">Sleek, intuitive, and powerful mobile-first front-end framework for faster and easier web development.</small>
            </div>
          </div>
          <div class="line pull-in"></div>
          <div class="media">
            <span class="pull-left thumb-sm"><i class="fa fa-file-o fa-3x text-muted"></i></span>                
            <div class="media-body">
              <div class="pull-right text-center text-muted">
                <strong class="h4">17</strong><br>
                <small class="label bg-light">feb</small>
              </div>
              <a href class="h4">Bootstrap documents</a>
              <small class="block"><a href>John Smith</a> <span class="label label-info">Friends</span></small>
              <small class="block m-t-sm">There are a few easy ways to quickly get started with Bootstrap, each one appealing to a different skill level and use case. Read through to see what suits your particular needs.</small>
            </div>
          </div>
          <div class="line pull-in"></div>
          <div class="media">
            <div class="media-body">
              <div class="pull-right text-center text-muted">
                <strong class="h4">09</strong><br>
                <small class="label bg-light">jan</small>
              </div>
              <a href class="h4 text-success">Mobile first html/css framework</a>
              <small class="block m-t-sm">Bootstrap, Ratchet</small>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <!-- .comment-list -->
      <div class="m-b b-l m-l-md streamline">
        <div>
          <a class="pull-left thumb-sm avatar m-l-n-md">
            <img src="img/a1.jpg" class="img-circle" alt="...">
          </a>
          <div class="m-l-lg panel b-a">
            <div class="panel-heading pos-rlt b-b b-light">
              <span class="arrow left"></span>
              <a href>John smith</a>
              <label class="label bg-info m-l-xs">Editor</label> 
              <span class="text-muted m-l-sm pull-right">
                <i class="fa fa-clock-o"></i>
                Just now
              </span>
            </div>
            <div class="panel-body">
              <div>Lorem ipsum dolor sit amet, consecteter adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet.</div>
              <div class="m-t-sm">
                <a href ui-toggle-class class="btn btn-default btn-xs active">
                  <i class="fa fa-star-o text-muted text"></i>
                  <i class="fa fa-star text-danger text-active"></i> 
                  Like
                </a>
                <a href class="btn btn-default btn-xs">
                  <i class="fa fa-mail-reply text-muted"></i> Reply
                </a>
              </div>
            </div>
          </div>
        </div>
        <!-- .comment-reply -->
        <div class="m-l-lg">
          <a class="pull-left thumb-sm avatar">
            <img src="img/a8.jpg" alt="...">
          </a>          
          <div class="m-l-xxl panel b-a">
            <div class="panel-heading pos-rlt">
              <span class="arrow left pull-up"></span>
              <span class="text-muted m-l-sm pull-right">
                <i class="fa fa-clock-o"></i>
                10m ago
              </span>
              <a href>Mika Sam</a> 
              Report this comment is helpful                           
            </div>
          </div>
        </div>
        <!-- / .comment-reply -->
        <div>
          <a class="pull-left thumb-sm avatar m-l-n-md">
            <img src="img/a9.jpg" alt="...">
          </a>          
          <div class="m-l-lg panel b-a">
            <div class="panel-heading pos-rlt b-b b-light">
              <span class="arrow left"></span>                    
              <a href>By me</a>
              <label class="label bg-success m-l-xs">User</label> 
              <span class="text-muted m-l-sm pull-right">
                <i class="fa fa-clock-o"></i>
                1h ago
              </span>
            </div>
            <div class="panel-body">
              <div>This comment was posted by you.</div>
            </div>
          </div>
        </div>
        <div>
          <a class="pull-left thumb-sm avatar m-l-n-md"><img src="img/a5.jpg" alt="..."></a>          
          <div class="m-l-lg panel b-a">
            <div class="panel-heading pos-rlt b-b b-light">
              <span class="arrow left"></span>
              <a href>Peter</a>
              <label class="label bg-primary m-l-xs">Vip</label> 
              <span class="text-muted m-l-sm pull-right">
                <i class="fa fa-clock-o"></i>
                2hs ago
              </span>
            </div>
            <div class="panel-body">
              <blockquote>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                <small>Someone famous in <cite title="Source Title">Source Title</cite></small>
              </blockquote>
              <div>Lorem ipsum dolor sit amet, consecteter adipiscing elit...</div>
              <div class="m-t-sm">
                <a href data-toggle="class" class="btn btn-default btn-xs">
                  <i class="fa fa-star-o text-muted text"></i>
                  <i class="fa fa-star text-danger text-active"></i> 
                  Like
                </a>
                <a href class="btn btn-default btn-xs"><i class="fa fa-mail-reply text-muted"></i> Reply</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="clearfix m-b-lg">
        <a class="pull-left thumb-sm avatar"><img src="img/a6.jpg" alt="..."></a>
        <div class="m-l-xxl">
          <form class="m-b-none">
            <div class="input-group">
              <input type="text" class="form-control input-lg" placeholder="Input your comment here">
              <span class="input-group-btn">
                <button class="btn btn-info btn-lg" type="button">POST</button>
              </span>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6">
      <div class="list-group">
        <a href class="list-group-item">
          <span class="badge badge-empty">201</span>
          <i class="fa fa-envelope fa-fw m-r-xs"></i> Inbox
        </a>
        <a href class="list-group-item">
          <span class="badge bg-info">5021</span>
          <i class="fa fa-eye fa-fw m-r-xs"></i> Profile visits
        </a>
        <a href class="list-group-item">
          <i class="fa fa-chevron-right text-muted"></i>
          <span class="badge bg-success">14</span>
          <i class="fa fa-phone fa-fw m-r-xs"></i> Call
        </a>
        <a href class="list-group-item">
          <span class="badge bg-dark">20</span>
          <i class="fa fa-comments-o fa-fw m-r-xs"></i> Messages
        </a>
        <a href class="list-group-item">
          <span class="badge bg-warning">14</span>
          <i class="fa fa-bookmark fa-fw m-r-xs"></i> Bookmarks
        </a>
        <a href class="list-group-item">
          <span class="badge bg-info">30</span>
          <i class="fa fa-bell fa-fw m-r-xs"></i> Notifications
        </a>
        <a href class="list-group-item">
          <span class="badge bg-danger">10</span>
          <i class="fa fa-clock-o fa-fw m-r-xs"></i> Watch
        </a>
      </div>
      <div class="m-b m-t-lg">
        <a href class="avatar thumb-xs m-r-xs">
          <img src="img/a7.jpg" alt="...">
          <i class="on b-white"></i>
        </a>
        <a href class="avatar thumb-xs m-r-xs">
          <img src="img/a8.jpg" alt="...">
          <i class="busy b-white"></i>
        </a>
        <a href class="avatar thumb-xs m-r-xs">
          <img src="img/a9.jpg" alt="...">
          <i class="away b-white"></i>
        </a>
        <a href class="avatar thumb-xs m-r-xs">
          <img src="img/a10.jpg" alt="...">
          <i class="on b-white"></i>
        </a>
        <a href class="btn btn-success btn-rounded font-bold"> +152 </a>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="panel b-a">
        <div class="panel-heading b-b b-light">
          <span class="badge bg-warning pull-right">10</span>
          <a href class="font-bold">Messages</a>
        </div>
        <ul class="list-group list-group-lg no-bg auto">
          <li class="list-group-item clearfix">
            <span class="pull-left thumb-sm avatar m-r">
              <img src="img/a4.jpg" alt="...">
              <i class="on b-white bottom"></i>
            </span>
            <span class="clear">
              <span>Chris Fox</span>
              <small class="text-muted clear text-ellipsis">What's up, buddy</small>
            </span>
          </li>
          <li class="list-group-item clearfix">
            <span class="pull-left thumb-sm avatar m-r">
              <img src="img/a5.jpg" alt="...">
              <i class="on b-white bottom"></i>
            </span>
            <span class="clear">
              <span>Amanda Conlan</span>
              <small class="text-muted clear text-ellipsis">Come online and we need talk about the plans that we have discussed</small>
            </span>
          </li>
          <li class="list-group-item clearfix">
            <span class="pull-left thumb-sm avatar m-r">
              <img src="img/a6.jpg" alt="...">
              <i class="busy b-white bottom"></i>
            </span>
            <span class="clear">
              <span>Dan Doorack</span>
              <small class="text-muted clear text-ellipsis">Hey, Some good news</small>
            </span>
          </li>
          <li class="list-group-item clearfix">
            <span class="pull-left thumb-sm avatar m-r">
              <img src="img/a7.jpg" alt="...">
              <i class="away b-white bottom"></i>
            </span>
            <span class="clear">
              <span>Lauren Taylor</span>
              <small class="text-muted clear text-ellipsis">Nice to talk with you.</small>
            </span>
          </li>
        </ul>
        <div class="clearfix panel-footer">
          <div class="input-group">
            <input type="text" class="form-control input-sm btn-rounded" placeholder="Search">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-default btn-sm btn-rounded"><i class="fa fa-search"></i></button>
            </span>
          </div>
        </div>
      </div>       
    </div>
  </div>
</div>
