
 @extends('layouts.master')

 @section('title','LRI | Liste des articles')

@section('header_page')

      <h1>
        Actualites
        <small>Liste</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Actualites</a></li>
      </ol>

@endsection

@section('asidebar')

        <li >
          <a href="{{url('dashboard')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="active">
                <a href="{{url('dashboard')}}">
                        <i class="fa fa-newspaper-o"></i> <span>Actualites</span>
                </a>
              </li>
        <li>
          <a href="{{url('equipes')}}">
            <i class="fa fa-group"></i> 
            <span>Equipes</span>
          </a>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Membres</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li ><a href="{{url('trombinoscope')}}"><i class="fa fa-id-badge"></i> Trombinoscope</a></li>
            <li class="active"><a href="{{url('membres')}}"><i class="fa fa-list"></i> Liste</a></li>
          </ul>
        </li>
        <li class="active">
            <a href="{{url('partenaires')}}">
              <i class="fa fa-group"></i> 
              <span>Partenaires</span>
            </a>
          </li>
          <li >
              <a href="{{url('contacts')}}">
                <i class="fa fa-list"></i> 
                <span>Contacts</span>
              </a>
            </li>
            <li>
                <a href="{{url('stages')}}">
                  <i class="fa fa-file-pdf-o"></i> 
                  <span>Stages</span>
                </a>
              </li>
         <li>
          <a href="{{url('theses')}}">
            <i class="fa fa-file-pdf-o"></i> 
            <span>Thèses</span>
          </a>
        </li>
      
         <li>
          <a href="{{url('articles')}}">
            <i class="fa fa-newspaper-o"></i> 
            <span>Articles</span></a>
          </li>

           <li>
          <a href="{{url('projets')}}">
            <i class="fa fa-folder-open-o"></i> 
            <span>Projets</span>
          </a>
        </li>
        <li >
            <a href="{{url('materiels')}}">
              <i class="glyphicon glyphicon-blackboard"></i> 
              <span>Materiels</span>
            </a>
          </li>
          @if(Auth::user()->role->nom == 'admin' )

          <li>
          <a href="{{url('parametre')}}">
            <i class="fa fa-gears"></i> 
            <span>Paramètres</span></a>
          </li>
          @endif
  @endsection

@section('content')


    <div class="row">
      <div class="col-md-12">
        <div class="box col-xs-12 form_rad">
          <div class="container" style="padding-top: 30px">
          <div class="row" style="padding-bottom: 20px">
             <div class="box-header col-xs-9">
              <h3 class="box-title">Liste des Actualites</h3>
            </div>
          </div>
          </div>
            
            <!-- /.box-header -->
            <div class="box-body">
           
              <div class="pull-right">
                <a href="{{url('actualite/create')}}" type="button" class="btn btn-block btn-success btn-lg"><i class="fa fa-plus"> Nouvel Actualite</i></a>
              </div>
              
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th class="col-md-2">Createur</th>
                  <th class="col-md-6">Titre</th>
                  <th class="col-md-2">Date</th>
                  <th class="col-md-2">Actions</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($actualites as $actualite)
                  <tr>
                      <th >{{$actualite->createur['name']}}</th>
                    <td>{{$actualite->titre}}</td>
                    <td>{{$actualite->date}}</td>
                    <td>
                      <div class="btn-group" >
                        
                        <a href="#voir{{ $actualite->id }}Modal" role="button" class="btn btn-info" data-toggle="modal"><i class="fa fa-eye"></i></a>
                        <div class="modal fade bd-example-modal-lg" id="voir{{ $actualite->id }}Modal" tabindex="-1" role="dialog" aria-labelledby="voir{{ $actualite->id }}ModalLabel" aria-hidden="true">
                  
                          <div class="modal-dialog modal-lg">
                              <div class="modal-content form_rad" >
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                  </div>
                                  
                                    <div class=" modal-body">
                                    
                                    <div class="input-group col-md-12">
                                      <div class="row">
                                          <div class="col-md-12">
                                            <img src="{{$actualite->photo}}"  class="col-md-12 img-fluid img-bordered img-rounded">
                                          </div>
                                          
                                      </div>
                                      <div class="row">
                                          <div class="col-md-12">
                                              <table class="table table-striped table-bordered table_act">
                                                <tr><td class="col-md-2"><strong>TITRE :</strong></td><td>{{$actualite->titre}}</td></tr>
                                                <tr><td><strong>DATE PUBLICATION :</strong></td><td>{{$actualite->date}}</td></tr>
                                                <tr><td colspan="2"><strong>RESUME :</strong>{!! $actualite->resume !!}</td></tr>
                                              </table>
                                              
                                              
                                            </div>
                                      </div>
                                    </div>
                                    

                                    <div class="input-group col-md-12" >
                                      <hr>
                                    <a  class="close btn btn-lg btn-default" data-dismiss="modal"><i class="fa  fa-mail-reply"></i> &nbsp;Annuler</a>
                                        </div>
                                      </div>
                                  
                                
                              </div>
                          </div>
                      </div>


                        @if(Auth::user()->role->nom == 'admin' || Auth::user()->id == $actualite->user_id )
                        <!--<a href="{{ url('actualite/'.$actualite->id.'/edit')}}" class="btn btn-default">
                          <i class="fa fa-edit"></i>
                        </a>-->
                        <a href="#modifier{{ $actualite->id }}Modal" role="button" class="btn btn-default btn_tiny" data-tiny="{{ $actualite->id }}" data-toggle="modal"><i class="fa fa-edit"></i></a>
                        <div class="modal fade bd-example-modal-lg "  id="modifier{{ $actualite->id }}Modal" tabindex="-1" role="dialog" aria-labelledby="modifier{{ $actualite->id }}ModalLabel" aria-hidden="true">
                  
                          <div class="modal-dialog modal-lg">
                              <div class="modal-content form_rad" >
                                <div class="modal-header" style="display: inline-flex;text-align: center;width: 100%;">
                                    <p class="form-group col-md-12"> Modifier ? </p>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                  </div>
                                  <form class="" action=" {{url('actualite/'. $actualite->id )}}" method="post"  id="contact_form" enctype="multipart/form-data" >
                                    <input type="hidden" name="_method" value="PUT">
                                    {{ csrf_field() }}
                                    
                                    <div class="modal-body">
                                     
                                  
                                    <div class="col-md-12" style="padding-bottom: 15px;">
                                      
                                      <div class="col-md-12 inputGroupContainer ">
                                          <label class="control-label">Titre :</label>  
                                        <div class="input-group col-md-12">
                                          <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
                                          <input  name="titre" placeholder="Titre" class="form-control" style="height: auto;"  type="text" value="{{$actualite->titre}}">
                                        </div>
                                          
                                      </div>
                                    </div> <br>
                      
                                        
                                        <div class="col-md-12"style="padding-bottom: 15px;">
                                            
                                          <div class="col-md-12 inputGroupContainer ">
                                              <label class="control-label">resume :</label><br>
                                            <div class="input-group col-md-12">
                                          <textarea  name="resume" placeholder="resume" class="form-control" style="height: auto;" id="mytextarea{{ $actualite->id }}" rows="10">{!!$actualite->resume!!}</textarea>
                                            </div>
                                              
                                          </div>
                                        </div><br>

                                        <div class="col-md-12" style="padding-bottom: 15px;">
                                          
                                          <div class="col-md-12 inputGroupContainer">
                                              <label class="control-label">Date PUB :</label> 
                                                <div class="input-group col-md-12">
                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                        <input name="date_pub" type="date" class="form-control" style="height: auto;" value="{{$actualite->date}}">
                                                    </div>
                                                    
                                          </div>
                                    </div>

                                    <div class=" col-md-12" style="padding-bottom: 15px;">
                                        
                                      <div class="col-md-12 inputGroupContainer">
                                          <label class="control-label">Photo :</label>
                                          <div class="input-group col-md-12">
                                      <input name="img_actualite_mod" class="form-control" type="file" accept="image/*" style="height: auto;" >
                                     </div>
                                      </div>
                                    </div>
                                    <div class="input-group col-md-12 text-center">
                                        <div class="input-group" >
                                            <hr>
                                          <a  class="close btn btn-lg btn-default" data-dismiss="modal"><i class="fa  fa-mail-reply"></i> &nbsp;Annuler</a>
                                           <button type="submit" class=" btn btn-lg btn-primary"><i class="fa fa-check"></i> Modifier</button> 
                                              </div>
                                    </div>
                                   
                                      </div>
                                  </form>
                                
                              </div>
                          </div>
                      </div>
                        @endif
                        @if( Auth::user()->role->nom != 'membre' || Auth::user()->id == $actualite->user_id )
                        <!-- <button type="submit" class="btn btn-danger ">
                            <i class="fa fa-trash-o"></i>
                        </button> -->

                         <a href="#supprimer{{ $actualite->id }}Modal" role="button" class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
                      <div class="modal fade" id="supprimer{{ $actualite->id }}Modal" tabindex="-1" role="dialog" aria-labelledby="supprimer{{ $actualite->id }}ModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content form_rad" >
                                  <div class="modal-header">
                                    <!--   <h5 class="modal-title" id="supprimer{{ $actualite->id }}ModalLabel">Supprimer</h5> -->
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body text-center">
                                      Voulez-vous vraiment effectuer la suppression ? 
                                  </div>
                                  <div class="modal-footer">
                                      <form class="form-inline" action="{{url('actualite/'.$actualite->id)}}"  method="POST">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                      <button type="button" class="btn btn-light" data-dismiss="modal">Non</button>
                                          <button type="submit" class="btn btn-danger">Oui</button>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>

                        @endif
                        <!--</form>-->
                    </div>
                    </td>
                  </tr>
                  @endforeach
                  
                 </tbody>
                <tfoot>
                <tr>
                  <th>Titre</th>
                  
                  
                  <th>Date</th>
                  <th>Actions</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        
      </div>
      
    </div>
 @endsection