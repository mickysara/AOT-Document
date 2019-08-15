<div class="ct-example tab-content tab-example-result" style="width: 1000px; margin: auto; margin-top: 62px; padding: 1.25rem;
            border-radius: .25rem;
            background-color: #f7f8f9;">

            <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
            <form name="Date" id="Date_form" method="post" action="<?= base_url("index.php/DateTest_Controller/date") ?>">
                <h1 class="display-2" style="color:#2d3436;">เวลา</h1>
                <hr>
                <div class="form-group">
                    <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                        </div>
                        <input id="date" name="date" class="form-control datepicker" placeholder="Select date" type="text" value="06/20/2019">
                    </div>
                </div>
                
                <button type="submit" class="btn btn-success btn-lg" style="margin-top: 44px; margin-bottom: 44px; width:120px;" >ยืนยัน</button>
                
                
            </form>
            </div>
            </div>

            
            
</div>