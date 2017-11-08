<div class="container">
    <div id="rootwizard">
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <ul>
                        <li><a class="badge badge-pill badge-info"  href="#tab1" data-toggle="tab">Step 1</a></li>
                        <li><a class="badge badge-pill badge-info"  href="#tab2" data-toggle="tab">Step 2</a></li>
                        <li><a class="badge badge-pill badge-info"  href="#tab3" data-toggle="tab">Step 3</a></li>
                        <li><a class="badge badge-pill badge-info"  href="#tab4" data-toggle="tab">Step 4</a></li>
                        <li><a class="badge badge-pill badge-info"  href="#tab5" data-toggle="tab">Step 5</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="bar" class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
        </div>
        <br>
        <div>
            <ul class="pager wizard">
                <li class="previous first" style="display:none;">First</li>
                <li class="previous btn btn-outline-info">Previous</li>
                <li class="next last" style="display:none;">Last</li>
                <li class="next btn btn-outline-info">Next</li>
            </ul>
        </div>
        <br>
        <div class="tab-content">
            <div class="tab-pane" id="tab1">
                <h3><strong>Step 1 </strong> Select banner template</h3>
                <hr>
                @include('inc.bannertemplate')
            </div>
            <div class="tab-pane" id="tab2">
                <h3><strong>Step 2</strong> Select background color from the list</h3>
                <hr>
                @include('inc.colorpicker')
            </div>
            <div class="tab-pane" id="tab3">
                <h3><strong>Step 3</strong> Insert banner text</h3>
                <hr>
                @include('inc.bannertext')
            </div>
            <div class="tab-pane" id="tab4">
                <h3><strong>Step 4</strong> Enter button text</h3>
                <hr>
                @include('inc.btnTxtColor')
            </div>
            <div class="tab-pane" id="tab5">
                <h3><strong>Step 5</strong> Banner preview</h3>
                <hr>
                @include('inc.messages')
                <img src="/images/{{ Session::get('imageName') }}"/>
            </div>
            <br>
        </div>

    </div>
</div>
<link rel="stylesheet" href="https://bootswatch.com/4/darkly/bootstrap.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="js/jquery.bootstrap.wizard.js"></script>
<script>
    $(document).ready(function() {
        $('#rootwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {
            var $total = navigation.find('li').length;
            var $current = index+1;
            var $percent = ($current/$total) * 100;
            $('#rootwizard .progress-bar').css({width:$percent+'%'});
        }});

    });
</script>