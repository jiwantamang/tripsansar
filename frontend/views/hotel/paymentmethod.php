<div class="site-index">
    <div class="row small-margin">
        <div class="paymentCont">
            
                <div class="panel panel-danger small-margin">
                    <div class="panel-heading">
                      <h3 class="panel-title">Select Your Payment Method</h3>
                    </div>
                    <div class="panel-body">
                      
		<div class="paymentWrap">
                        <div class="btn-group paymentBtnGroup btn-group-justified" data-toggle="buttons">
                           <label class="btn paymentMethod active">
                                <div class="method reserve"></div>
                                <input type="radio" name="options" checked value="reserve"> 
                           </label>
                           <label class="btn paymentMethod">
                                <div class="method esewa"></div>
                                <input type="radio" name="options" value="esewa"> 
                           </label>
                           <label class="btn paymentMethod">
                                <div class="method paypal-card"></div>
                                <input type="radio" name="options" value="paypal"> 
                            </label>
        <!--					            <label class="btn paymentMethod">
                                                                <div class="method amex"></div>
                                                                <input type="radio" name="options">
                                                            </label>
                                                             <label class="btn paymentMethod">
                                                                <div class="method vishwa"></div>
                                                                <input type="radio" name="options"> 
                                                            </label>
                                                            <label class="btn paymentMethod">
                                                                <div class="method ez-cash"></div>
                                                                <input type="radio" name="options"> 
                                                            </label>-->

                        </div>        
                       </div>

                        <div class="progress" style="display:none">
                            <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                              <span class="sr-only">40% Complete (success)</span>
                            </div>
                        </div>
                        <button class="btn btn-success pull-right" id="<?= $id ?>" onclick="ajaxPaymentMethod(this.id)">Next</button>    
                    </div>
                    
                </div>

		
            </div>
		
	</div>
    
    
</div>
