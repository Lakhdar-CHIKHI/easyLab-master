@extends('layouts.master')

@section('title','LRI | Contact')

@section('header_page')

	  <h1>
    Contacts
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="{{url('contacts')}}">Contacts</a></li>
        <li class="active">Modifier</li>
      </ol>

@endsection

@section('asidebar')
		<li >
          <a href="{{url('dashboard')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <li>
          <a href="{{url('equipes')}}">
            <i class="fa fa-group"></i> 
            <span>Equipes</span>
          </a>
        </li>
        
        <li class="treeview ">
          <a href="#">
            <i class="fa fa-user"></i> <span>Membres</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('trombinoscope')}}"><i class="fa fa-id-badge"></i> Trombinoscope</a></li>
            <li><a href="{{url('membres')}}"><i class="fa fa-list"></i> Liste</a></li>
          </ul>
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
          <a href="{{url('partenaires')}}">
            <i class="fa fa-group"></i> 
            <span>Partenaires</span>
          </a>
        </li>

         <li class="treeview active">
          <a href="#">
            <i class="fa fa-user"></i> <span>Contacts</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('trombinoscopecontact')}}"><i class="fa fa-id-badge"></i> Trombinoscope</a></li>
            <li><a href="{{url('contacts')}}"><i class="fa fa-list"></i> Liste</a></li>
          </ul>
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
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              
              <h3 class="profile-username text-center">{{$contact->nom}} {{$contact->prenom}}</h3>

              <p class="text-muted text-center">{{$contact->fonction}}</p>
              <div class="text-center">
                <div class="btn-group">
              </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
    
        </div>
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li><a href="#activity1" data-toggle="tab">A propos</a></li>
              
              <li class="active"><a href="#activity" data-toggle="tab">Modifier</a></li>
              
              <li><a href="#timeline" data-toggle="tab">Articles</a></li>
              <li><a href="#timeline4" data-toggle="tab">Projets</a></li>
              <li><a href="#timeline2" data-toggle="tab">Theses Encadre</a></li>
              <li><a href="#timeline3" data-toggle="tab">Theses CooEncadre</a></li>
            </ul>

            <div class="tab-content">
            <div class="tab-pane" id="activity1">
                <div class="box-body">
                

                  <div class="row" style="margin-top: 10px">
                  <div class="col-md-3">
                    <strong>N° de télépone</strong>
                  </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      {{$contact->tel}}
                    </p>
                  </div>
              	  </div>
                 
                  @if($contact->partenaire_id)
                <div class="row" style="margin-top: 10px">
                <div class="col-md-3">
                  <strong><i class="fa fa-group  margin-r-5"></i>Partenaire</strong>                
                 </div>
                  <div class="col-md-9">
                    <a href="#">{{$contact->partenaire->nom}}</a>
                  </div>
                </div>
                @endif

                <div class="row" style="margin-top: 10px">
                 <div class="col-md-3" style="padding-top: 10px">
                   <strong><i class="fa fa-envelope margin-r-5"></i>Email</strong>
                 </div> 
                 <div class="col-md-9" style="padding-top: 10px">
                   {{$contact->adresse_mail}}
                 </div>
                </div>


              <strong><i class="margin-r-5"></i></strong>
              <hr>
             @if($contact->these)
                <div class="col-md-3">
                  <strong><i class="fa fa-graduation-cap margin-r-5"></i> Thèse </strong>                
                 </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      <strong> Titre : </strong> {{$contact->these->titre}}
                      </p>
                    <p class="text-muted">
                      
                      <strong>Résumé :</strong>  {{$contact->these->sujet}}
                    </p>
                     <p class="text-muted">
                      <strong>Encadreur :</strong> {{$contact->these->encadreur_int}}{{$contact->these->encadreur_ext}}
                      </p>
                      <p class="text-muted">
                     <strong>Coencadreur :</strong> {{$contact->these->coencadreur_int}}{{$contact->these->coencadreur_ext}}
                     </p>
                    
                  </div>
                @endif

            </div>
              </div>



            
              <div class="tab-pane" id="timeline">
                <div class="box-body" style="padding-top: 30px;">

                  <div class="pull-right">
                <a href="{{url('articles/create')}}" type="button" class="btn btn-block btn-success btn-lg"><i class="fa fa-plus"> Nouvel article</i></a>
              </div>
                   
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Type</th>
                  <th>Titre</th>
                  <th>Année</th>
                  @if((Auth::id() != $contact->id))
                  <th>Actions</th>
                  @endif
                </tr>
                </thead>
                <tbody> 
                  <!-- modifier -->    
                  @foreach ($contact->articles as $article) 
                  <tr>
                    <td>{{$article->type}}</td>
                    <td>{{$article->titre}}</td>
                
                    <td>{{$article->annee}}</td>
                    <td>
                     
                      <div class="btn-group">
                        <form action="{{ url('articles/'.$article->id)}}" method="post">
                          
                          {{csrf_field()}}
                          {{method_field('DELETE')}}

                        <a href="{{ url('articles/'.$article->id.'/details')}}" class="btn btn-info">
                            <i class="fa fa-eye"></i>
                        </a>
                        @if(Auth::user()->role->nom == 'admin' || Auth::user()->id == $article->deposer)
                        <a href="{{ url('articles/'.$article->id.'/edit')}}" class="btn btn-default">
                          <i class="fa fa-edit"></i>
                        </a>
                        @endif
                        @if( Auth::user()->role->nom != 'membre' || Auth::user()->id == $article->deposer)
                        <button type="submit" class="btn btn-danger ">
                            <i class="fa fa-trash-o"></i>
                        </button>
                        @endif
                        </form>
                      </div>
                      
                    </td>
                  </tr>
                  @endforeach        </tbody>
                <tfoot>
                <tr>
                  <th>Titre</th>
                  <th>Type</th>
                  
                  <th>Année</th>
                  
                </tr>
                </tfoot>
              </table>
            </div>  
              </div>





            








            
           

            
              <div class="tab-pane" id="timeline2">
                <div class="box-body" style="padding-top: 30px;">

                  <div class="pull-right">
                <a href="{{url('theses/create')}}" type="button" class="btn btn-block btn-success btn-lg"><i class="fa fa-plus"> Nouvel these</i></a>
              </div>
                   
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr><th>Titre</th>
                  <th>Sujet</th>
                  <th>Doctorant</th>
                  <th>Année</th>
                  @if((Auth::id() != $contact->id))
                  <th>Actions</th>
                  @endif
                </tr>
                </thead>
                <tbody> 
                  <!-- modifier -->    
                  @foreach ($contact->thesese as $these) 
                  <tr>
                  <td>{{$these->titre}}</td>
                    <td>{{$these->sujet}}</td>
                    <td><a href="{{url('membres/'.$these->user_id.'/details')}}">{{$these->user->name}} {{$these->user->prenom}}</a></td>
                    <td>{{$these->date_debut}}</td>
                    <td>
                     
                      <div class="btn-group">
                        <form action="{{ url('theses/'.$these->id)}}" method="post">
                          
                          {{csrf_field()}}
                          {{method_field('DELETE')}}

                        <a href="{{ url('theses/'.$these->id.'/details')}}" class="btn btn-info">
                            <i class="fa fa-eye"></i>
                        </a>
                        @if(Auth::user()->role->nom == 'admin' || Auth::user()->id == $these->deposer)
                        <a href="{{ url('theses/'.$these->id.'/edit')}}" class="btn btn-default">
                          <i class="fa fa-edit"></i>
                        </a>
                        @endif
                        @if( Auth::user()->role->nom != 'membre' || Auth::user()->id == $these->deposer)
                        <button type="submit" class="btn btn-danger ">
                            <i class="fa fa-trash-o"></i>
                        </button>
                        @endif
                        </form>
                      </div>
                      
                    </td>
                  </tr>
                  @endforeach        </tbody>
                <tfoot>
                <tr>
                <th>Titre</th>
                  <th>Sujet</th>
                  <th>Doctorant</th>
                  <th>Année</th>
                  @if((Auth::id() != $contact->id))
                  <th>Actions</th>
                  @endif
                </tr>
                </tfoot>
              </table>
            </div>  
              </div>









            
              <div class="tab-pane" id="timeline3">
                <div class="box-body" style="padding-top: 30px;">

                  <div class="pull-right">
                <a href="{{url('theses/create')}}" type="button" class="btn btn-block btn-success btn-lg"><i class="fa fa-plus"> Nouvel these</i></a>
              </div>
                   
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>Titre</th>
                  <th>Sujet</th>
                  <th>Doctorant</th>
                  <th>Année</th>
                  @if((Auth::id() != $contact->id))
                  <th>Actions</th>
                  @endif
                </tr>
                </thead>
                <tbody> 
                  <!-- modifier -->    
                  @foreach ($contact->thesesc as $these) 
                  <tr>
                   <td>{{$these->titre}}</td>
                <td>{{$these->sujet}}</td>
                <td></td>
                <td><a href="{{url('membres/'.$these->user_id.'/details')}}">{{$these->user->name}} {{$these->user->prenom}}</a></td>
                   
                    <td>{{$these->date_debut}}</td>
                    <td>
                     
                      <div class="btn-group">
                        <form action="{{ url('theses/'.$these->id)}}" method="post">
                          
                          {{csrf_field()}}
                          {{method_field('DELETE')}}

                        <a href="{{ url('theses/'.$these->id.'/details')}}" class="btn btn-info">
                            <i class="fa fa-eye"></i>
                        </a>
                        @if(Auth::user()->role->nom == 'admin' || Auth::user()->id == $these->deposer)
                        <a href="{{ url('theses/'.$these->id.'/edit')}}" class="btn btn-default">
                          <i class="fa fa-edit"></i>
                        </a>
                        @endif
                        @if( Auth::user()->role->nom != 'membre' || Auth::user()->id == $these->deposer)
                        <button type="submit" class="btn btn-danger ">
                            <i class="fa fa-trash-o"></i>
                        </button>
                        @endif
                        </form>
                      </div>
                      
                    </td>
                  </tr>
                  @endforeach        </tbody>
                <tfoot>
                <tr>
                <th>Titre</th>
                  <th>Sujet</th>
                  <th>Doctorant</th>
                  <th>Année</th>
                  @if((Auth::id() != $contact->id))
                  <th>Actions</th>
                  @endif
                </tr>
                </tfoot>
              </table>
            </div>  
              </div>


              <div class="tab-pane" id="timeline4">
                <div class="box-body" style="padding-top: 30px;">

                  <div class="pull-right">
                <a href="{{url('projets/create')}}" type="button" class="btn btn-block btn-success btn-lg"><i class="fa fa-plus"> Nouveau projet</i></a>
              </div>
                   
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Intitulé</th>
                  <th>Type</th>
                   <th>Chef</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                  @foreach($contact->projets as $projet)
                  <tr>
                    <td>{{ $projet->intitule }}</td>
                    <td>{{ $projet->type }}</td>
                    <td><a href="{{url('membres/'.$projet->chef_id.'/details')}}">{{ $projet->chef->name}} {{ $projet->chef->prenom}}</a></td>
                   
                    <td>


                      <form action="{{ url('projets/'.$projet->id)}}" method="post"> 

                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                      <a href="{{ url('projets/'.$projet->id.'/details')}} " class="btn btn-info">
                        <i class="fa fa-eye"></i>
                      </a>
                      @if(Auth::user()->role->nom != 'membre' )
                      <a href="{{ url('projets/'.$projet->id.'/edit')}}" class="btn btn-default">
                        <i class="fa fa-edit"></i>
                      </a>
                      @endif
                      @if(Auth::user()->role->nom != 'membre' )
                      <!-- <button type="submit" class="btn btn-danger">
                        <i class="fa fa-trash-o"></i>
                      </button> -->
                       <a href="#supprimer{{ $projet->id }}Modal" role="button" class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
                      <div class="modal fade" id="supprimer{{ $projet->id }}Modal" tabindex="-1" role="dialog" aria-labelledby="supprimer{{ $projet->id }}ModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                    <!--   <h5 class="modal-title" id="supprimer{{ $projet->id }}ModalLabel">Supprimer</h5> -->
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body text-center">
                                      Voulez-vous vraiment effectuer la suppression ? 
                                  </div>
                                  <div class="modal-footer">
                                      <form class="form-inline" action="{{ url('projets/'.$projet->id)}}"  method="POST">
                                          @method('DELETE')
                                          @csrf
                                      <button type="button" class="btn btn-light" data-dismiss="modal">Non</button>
                                          <button type="submit" class="btn btn-danger">Oui</button>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>


                      @endif
                      </form>
                    </div>
                    </td>
                  </tr>
                  @endforeach

                  


                </tbody>
                <tfoot>
                 <tr>
                  <th>Intitulé</th>
                  <th>Type</th>
                  <th>Chef</th>
                  <th>Actions</th>
                </tr>
                </tfoot>
              </table>
            </div>  
              </div>


              <div class="active tab-pane" id="activity">
            <form class="well form-horizontal" action=" {{url('contacts/'. $contact->id) }} " method="post"  id="contact_form">

              <input type="hidden" name="_method" value="PUT">
              {{ csrf_field() }}

              <fieldset>

           


<div class="form-group col-md-12 ">   <div class="form-group col-md-10 "> 
                        <label class="col-md-3 control-label">Nom</label>  
                        <div class="col-md-9 inputGroupContainer @if($errors->get('nom')) has-error @endif">
                          <div class="input-group"  style="width: 100%">
                            <input  name="nom" class="form-control" value="{{$contact->nom}}" type="text">
                            <span class="help-block">
                                @if($errors->get('nom'))
                                  @foreach($errors->get('nom') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                          </div>
                        </div>
                      </div>

                       <!-- Text input-->
                       </div>


<div class="form-group col-md-12 ">   <div class="form-group col-md-10 "> 
                        <label class="col-md-3 control-label">Prénom</label>  
                        <div class="col-md-9 inputGroupContainer @if($errors->get('prenom')) has-error @endif">
                          <div class="input-group"  style="width: 100%">
                            <input  name="prenom" value="{{$contact ->prenom}}" class="form-control"  type="text">
                            <span class="help-block">
                                @if($errors->get('prenom'))
                                  @foreach($errors->get('prenom') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                          </div>
                        </div>
                      </div>


                      </div>


<div class="form-group col-md-12 ">   <div class="form-group col-md-10 "> 
                          <label class="col-md-3 control-label">Partenaire</label>
                            <div class="col-md-9 selectContainer @if($errors->get('partenaire')) has-error @endif">
                              <div class="input-group"  style="width: 100%">
                                  <select name="partenaire_id" id="partenaireC" class="form-control selectpicker">
                                    <option value="{{$contact->partenaire_id}}">{{$contact->partenaire->nom}}</option>
                                    @foreach($partenaires as $partenaire)
                                    <option value="{{$partenaire->id}}">{{$partenaire->nom}}</option>
                                    @endforeach
                                    
                                  </select>
                                  <span class="help-block">
                                @if($errors->get('partenaire_id'))
                                  @foreach($errors->get('partenaire_id') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                              </div>
                            </div>
                      </div>
                      <div class="col-md-2 pull-left" style="padding-bottom: 20px">
                <a id="create-part" type="button" class="btn btn-block btn-success btn-lg" data-toggle="modal" data-target="#modalFormpart"><i class="fa fa-plus"></i> <i class="fa fa-group"></i></a>
            </div>



                      </div>


<div class="form-group col-md-12 ">   <div class="form-group col-md-10 "> 
                        <label class="col-md-3 control-label">E-Mail</label>  
                          <div class="col-md-9 inputGroupContainer @if($errors->get('adresse_mail')) has-error @endif">
                            <div class="input-group"  style="width: 100%">
                                <input name="adresse_mail" type="email" class="form-control" value="{{$contact->adresse_mail}}">
                                <span class="help-block">
                                @if($errors->get('adresse_mail'))
                                  @foreach($errors->get('adresse_mail') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                            </div>
                          </div>
                      </div>
                     
                   

                      </div>




  
                <div class="form-group col-md-12 ">   <div class="form-group col-md-10 "> 
                        <label class="col-md-3 control-label">Fonction</label>  
                          <div class="col-md-9 inputGroupContainer">
                            <div class="input-group"  style="width: 100%">
                                <input name="fonction" type="text" class="form-control" value="{{$contact->fonction}}">
                                
                            </div>
                          </div>
                      </div>
                      </div>


                




<div class="form-group col-md-12 ">   <div class="form-group col-md-10 "> 
                              <label class="col-md-3 control-label">N° Téléphone</label>  
                                <div class="col-md-9 input-group">
                                <div class="input-group"  style="width: 100%">
                                <input name="tel" type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask value="{{$contact->tel}}">
                              </div>
                        </div>
                      </div>
                      </div>

                    

            
                        
                 

              </fieldset>

              <div style="padding-top: 30px; margin-left: 35%;">
              <a href="{{url('contacts')}}" class=" btn btn-lg btn-default"><i class="fa  fa-mail-reply"></i> &nbsp;Annuler</a>
               <button type="submit" class=" btn btn-lg btn-primary"><i class="fa fa-check"></i> Valider</button> 
                  </div>
            </form>
          </div>


              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
      </div>


 
 

    
<!-- Modal -->
<div class="modal fade" id="modalFormpart" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
               <center><h2><b>Nouveau   Partenaire</b></h2></center>
            </div>
            
            <!-- Modal Body -->
            
    
            <form class="well form-horizontal" id="partform" action=" {{url('partenaires')}} " method="post"  id="contact_form " enctype="multipart/form-data">
              {{ csrf_field() }}
              <fieldset>

                <!-- Form Name -->
               

              


<div class=" col-md-12 ">   <div class="form-group col-md-10 "> 
                        <label class="col-xs-3 control-label">nom (*)</label>  
                        <div class="col-xs-9 inputGroupContainer @if($errors->get('nom')) has-error @endif">
                          <div style="width: 100%">
                            <input  name="nom" id="nomP" class="form-control" placeholder="nom" type="text" value="{{old('titre')}}">
                              <span class="help-block">
                                @if($errors->get('nom'))
                                  @foreach($errors->get('nom') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                              
                          </div>
                        </div>
                  </div>  
                  </div>


<div class=" col-md-12 ">   <div class="form-group col-md-10 "> 
                      <label class="col-md-3 control-label">type</label>
                      <div class="col-md-9 inputGroupContainer" >
                        <div style="width: 100%">
                          <input  name="type"  id="typeP" class="form-control" placeholder="intitule" type="text" value="{{old('type')}}">
                        </div>
                      </div>
                  </div>

                  </div>


<div class=" col-md-12 ">   <div class="form-group col-md-10 "> 
                      <label class="col-md-3 control-label">Pays (*)</label>
                      <div class="col-md-9 inputGroupContainer @if($errors->get('pays')) has-error @endif" >
                        <div style="width: 100%">
                          <input name="pays" id="paysP" class="form-control" type="text" placeholder="Entrez ...">{{old('pays')}}</textarea>

                            <span class="help-block">
                                @if($errors->get('pays'))
                                  @foreach($errors->get('pays') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>

                        </div>
                      </div>
                  </div>
                  </div>


<div class=" col-md-12 ">   <div class="form-group col-md-10 "> 
                      <label class="col-md-3 control-label">Ville (*)</label>
                      <div class="col-md-9 inputGroupContainer @if($errors->get('ville')) has-error @endif" >
                        <div style="width: 100%">
                          <input name="ville" id="villeP" class="form-control" type="text" placeholder="Entrez ...">{{old('ville')}}</textarea>

                            <span class="help-block">
                                @if($errors->get('ville'))
                                  @foreach($errors->get('ville') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>

                        </div>
                      </div>
                  </div>

                  </div>


<div class=" col-md-12 ">   <div class="form-group col-md-10 "> 
                              <label class="col-md-4 control-label">Photo</label>  
                              <div class="col-md-8 inputGroupContainer">
                              <input name="img" id="imgP" type="file" >
                             </div>
                            </div>
                            </div>


           
                  

              </fieldset>

              <div class="row" style="padding-top: 30px; margin-left: 35%;">
              
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" id="submit_part" class="btn btn-primary submitBtn" ><i class="fa fa-check"></i> Valider</button>
          </div>
            </form>
            </div>
            
            <!-- Modal Footer -->
        
        </div>
    </div>
</div>









@endsection