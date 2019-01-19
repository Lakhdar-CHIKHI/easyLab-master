<html>


<body>
    
<!-- Modal -->
<div class="modal fade" id="modalForm" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
               <center><h2><b>Nouveau Membre</b></h2></center>
            </div>
            
            <!-- Modal Body -->
            
    
                <form class="well form-horizontal" method="POST" action="{{url('contacts')}}" id="contact_form" enctype="multipart/form-data">
              {{ csrf_field() }}
              <fieldset>

              
                <!-- Text input-->
                    <div class="col-md-12">

                      <div class="form-group col-md-8">
                        <label class="col-md-3 control-label">Nom *</label>  
                        <div class="col-md-9 inputGroupContainer @if($errors->get('nom')) has-error @endif">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input  name="nom" placeholder="Nom" class="form-control"  type="text" value="{{old('nom')}}">
                           </div>
                            <span class="help-block">
                                @if($errors->get('nom'))
                                  @foreach($errors->get('nom') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                        </div>
                      </div>


                       <!-- Text input-->

                      <div class="form-group col-md-8">
                        <label class="col-md-3 control-label">Prénom *</label>  
                        <div class="col-md-9 inputGroupContainer @if($errors->get('prenom')) has-error @endif">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input  name="prenom" placeholder="Prénom" class="form-control"  type="text" value="{{old('prenom')}}">
                          </div>
                            <span class="help-block">
                                @if($errors->get('prenom'))
                                  @foreach($errors->get('prenom') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                        </div>
                      </div>


                      <div class="form-group col-md-8 "> 
                          <label class="col-md-3 control-label">Partenaire * </label>
                            <div class="col-md-9 selectContainer @if($errors->get('partenaire')) has-error @endif">
                              <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                  <select name="partenaire" id="part" class="form-control selectpicker">
                                    <option></option>
                                    
                                  </select>

                              </div>
                            

                              <span class="help-block">
                                @if($errors->get('partenaire_id'))
                                  @foreach($errors->get('partenaire_id') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>

                            </div>
                            
                      </div>
                      <div class="col-md-2 pull-left" style="padding-bottom: 20px">
                <a href="{{url('partenaires/create')}}" type="button" class="btn btn-block btn-success btn-lg"><i class="fa fa-plus"></i> <i class="fa fa-group"></i></a>
            </div>



               

                      <div class="form-group col-md-8">
                        <label class="col-md-3 control-label">E-Mail *</label>  
                          <div class="col-md-9 inputGroupContainer @if($errors->get('adresse_mail')) has-error @endif">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input name="adresse_mail" type="adresse_mail" class="form-control" placeholder="Email" value="{{old('adresse_mail')}}" >
                            </div>
                            <span class="help-block">
                                @if($errors->get('adresse_mail'))
                                  @foreach($errors->get('adresse_mail') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                          </div>
                      </div>

                    
                    
                
                    <div class="form-group col-md-8">
                        <label class="col-md-3 control-label">Fonction*</label>  
                        <div class="col-md-9 ">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input  name="fonction" placeholder="fonction" class="form-control"  type="text" value="{{old('fonction')}}">
                           </div>
                           
                        </div>
                      </div>
                      <div class="form-group col-md-8">
                        <label class="col-md-3 control-label">Nature de cooperation*</label>  
                        <div class="col-md-9 ">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input  name="nature_de_cooperation" placeholder="nature de cooperation" class="form-control"  type="text" value="{{old('nature_de_cooperation')}}">
                           </div>
                           
                        </div>
                      </div>


<div class="form-group col-md-8">
                        <label class="col-md-3 control-label">N° Téléphone *</label>  
                        <div class="col-md-9 ">
                          <div class="input-group">
                            <span class="input-group-addon"> <i class="fa fa-phone"></i></i></span>
                            <input name="tel" type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask value="{{old('tel')}}">
                               </div>
                           
                        </div>
                      </div>
                   

                  


                  


                  

              </fieldset>

              <div style="padding-top: 30px; margin-left: 35%;">
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="submit_cont" class="btn btn-primary submitBtn" onclick="submitContactForm()">SUBMIT</button>
            </div>
            </form>
            </div>
            
            <!-- Modal Footer -->
        
        </div>
    </div>
</div>

</body>

</html>