<div class="container">
    <div class="row">
        <article class="col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">
            <div id="wid-id-0">
                <!-- widget div-->
                <div role="content">
                    <!-- widget content -->
                    <div class="widget-body">

                        <div class="row">
                            <form id="wizard-1">
                                <div id="bootstrap-wizard-1" class="col-sm-12">
                                    <div class="form-bootstrapWizard">
                                        <ul class="bootstrapWizard form-wizard">

                                            <li class="active" data-target="#step1">
                                                <a href="#tab1" data-toggle="tab"> <span class="step">1</span> <span
                                                            class="title"> </span> </a>
                                            </li>
                                            <li data-target="#step2" class="">
                                                <a href="#tab2" data-toggle="tab"> <span class="step">2</span> <span
                                                            class="title"></span> </a>
                                            </li>
                                            <li data-target="#step3" class="">
                                                <a href="#tab3" data-toggle="tab"> <span class="step">3</span> <span
                                                            class="title"></span> </a>
                                            </li>
                                            <li data-target="#step4" class="">
                                                <a href="#tab4" data-toggle="tab"> <span class="step">4</span> <span
                                                            class="title"></span> </a>
                                            </li>
                                            <li data-target="#step5" class="">
                                                <a href="#tab5" data-toggle="tab"> <span class="step">5</span> <span
                                                            class="title"></span> </a>
                                            </li>
                                            <li data-target="#step6" class="">
                                                <a href="#tab6" data-toggle="tab"> <span class="step">6</span> <span
                                                            class="title"></span> </a>
                                            </li>

                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>

                                </div>
                            </form>
                            <br>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab1">
                                    <br>
                                    <h3><strong>Step 1 </strong> Select banner template</h3>
                                    <hr>
                                    @include('inc.bannertemplate')

                                </div>

                                <div class="tab-pane" id="tab2">
                                    <br>
                                    <h3><strong>Step 2</strong> Select background</h3>
                                    <hr>
                                    @include('inc.colorpicker')

                                </div>
                                <div class="tab-pane" id="tab3">
                                    <br>
                                    <h3><strong>Step 3</strong> Insert banner text</h3>
                                    <hr>

                                    @include('inc.bannertext')

                                </div>

                                <div class="tab-pane" id="tab4">
                                    <br>
                                    <h3><strong>Step 4</strong> Select Button</h3>
                                    <hr>

                                    @include('inc.buttonpicker')

                                </div>


                                <div class="tab-pane" id="tab5">
                                    <br>
                                    <h3><strong>Step 5</strong> Enter button text</h3>
                                    <hr>

                                    @include('inc.btnTxtColor')

                                </div>

                                <div class="tab-pane" id="tab6">
                                    <br>
                                    <h3><strong>Step 6</strong> Banner preview</h3>
                                    <hr>

                                    @include('inc.messages')


                                    <img src="/images/{{ Session::get('imageName') }}"/>


                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- end widget content -->

            </div>
            <!-- end widget div -->

            <!-- end widget -->

        </article>
    </div>
</div>


