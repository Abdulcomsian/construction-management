@extends('layouts.companyprofile.master',['title' => 'Company Profile'])
@section('styles')
<style> 
@import url("https://fonts.googleapis.com/css?family=Poppins&display=swap");
@import url("https://fonts.googleapis.com/css?family=Bree+Serif&display=swap");

* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}

body {
  background: #e9e9e9;
  /* overflow-x: hidden; */
  /* padding-top: 90px; */
  font-family: "Poppins", sans-serif;
  /* margin: 0 100px; */
}
p {
  margin: 0 0 10px;
  color: rgba(0, 0, 0, 0.5);
}
.main-wrapper {
  margin-top: 25px;
}

.user-bio {
  margin-top: 40px;
  font-family: "Poppins", sans-serif;
}
.user-bio > h3 {
  font-size: 14px;
  font-weight: bold;
}

.bio {
  margin-top: 8px;
  font-size: 12px;
}

.profile-header {
  background: #fff;
  width: 100%;
  display: flex;
  flex-direction: column;
  position: relative;
  border-bottom: 2px solid lightslategrey;
}

.profile-img {
  float: left;
  width: 298px;
  height: 200px;
}

.profile-img img {
  border-radius: 50%;
  display: inline-block;
  height: 150px;
  width: 150px;
  border: 5px solid #fff;
  box-shadow: 0px 0px 9px -1px rgb(0 0 0 / 10%);
  position: relative;
  left: 68px;
  top: 20px;
  z-index: 5;
  background: #fff;
}

.profile-nav-info {
  float: left;
  display: flex;
  align-items: center;
  flex-direction: column;
  justify-content: center;
}

.profile-nav-info h3 {
  font-variant: small-caps;
  font-size: 2rem;
  font-family: sans-serif;
  font-weight: bold;
  text-transform: uppercase;
  color: #35c64a !important;
}

.profile-nav-info .address {
  display: flex;
  font-weight: bold;
  color: #777;
}

.profile-nav-info .address p {
  margin-right: 5px;
}

.profile-option {
  width: 40px;
  height: 40px;
  position: absolute;
  right: 50px;
  top: 50%;
  transform: translateY(-50%);
  border-radius: 50%;
  display: flex;
  justify-content: center;
  align-items: center;
  cursor: pointer;
  transition: all 0.5s ease-in-out;
  outline: none;
  background: #e40046;
}

.profile-option:hover {
  background: #fff;
  border: 1px solid #e40046;
}
.profile-option:hover .notification i {
  color: #e40046;
}

.profile-option:hover span {
  background: #e40046;
}

.profile-option .notification i {
  color: #fff;
  font-size: 1.2rem;
  transition: all 0.5s ease-in-out;
}

.profile-option .notification .alert-message {
  position: absolute;
  top: -5px;
  right: -5px;
  background: #fff;
  color: #e40046;
  border: 1px solid #e40046;
  padding: 5px;
  border-radius: 50%;
  height: 20px;
  width: 20px;
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 0.8rem;
  font-weight: bold;
}

.main-bd {
  width: 100%;
  display: flex;
  column-gap: 40px;
}

.profile-side {
  width: 300px;
  background: #fff;
  padding: 44px 30px 20px;
  font-family: "Bree Serif", serif;
  z-index: 99;
  height: 100%;
}

.profile-side p {
  margin-bottom: 7px;
  color: #333;
  font-size: 14px;
  font-family: "Poppins", sans-serif;
}

.profile-side p i {
  color: #e40046;
  margin-right: 10px;
}

.mobile-no i {
  transform: rotateY(180deg);
  color: #e40046;
}

.profile-btn {
  display: flex;
}

button.chatbtn,
button.createbtn {
  border: 0;
  padding: 10px;
  width: 100%;
  border-radius: 3px;
  background: #e40046;
  color: #fff;
  font-family: "Bree Serif";
  font-size: 1rem;
  margin: 5px 2px;
  cursor: pointer;
  outline: none;
  margin-bottom: 10px;
  transition: background 0.3s ease-in-out;
  box-shadow: 0px 5px 7px 0px rgba(0, 0, 0, 0.3);
}

button.chatbtn:hover,
button.createbtn:hover {
  background: rgba(288, 0, 70, 0.9);
}

button.chatbtn i,
button.createbtn i {
  margin-right: 5px;
}

.user-rating {
  display: flex;
}

.user-rating h3 {
  font-size: 2.5rem;
  font-weight: 200;
  margin-right: 5px;
  letter-spacing: 1px;
  color: #666;
}

.user-rating .no-of-user-rate {
  font-size: 0.9rem;
}

.rate {
  padding-top: 6px;
}

.rate i {
  font-size: 0.9rem;
  color: rgba(228, 0, 70, 1);
}

.nav {
  width: 100%;
  z-index: -1;
}

.nav ul {
  display: flex;
  justify-content: space-around;
  list-style-type: none;
  height: 40px;
  background: #fff;
  box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);
}

.nav ul li {
  padding: 10px;
  width: auto;
  cursor: pointer;
  text-align: center;
  transition: all 0.2s ease-in-out;
}

.nav ul li:hover,
.nav ul li.active {
  box-shadow: 0px -3px 0px rgba(288, 0, 70, 0.9) inset;
}

.profile-body {
  width: 100%;
  z-index: -1;
}

.tab {
  display: none;
}

.tab {
  padding: 20px;
  width: 100%;
  text-align: center;
}

@media (max-width: 1100px) {
  .profile-side {
    width: 250px;
    padding: 90px 15px 20px;
  }

  .profile-img img {
    height: 200px;
    width: 200px;
    left: 50px;
    top: 50px;
  }
}

@media (max-width: 900px) {
  body {
    margin: 0 20px;
  }

  .profile-header {
    display: flex;
    height: 100%;
    flex-direction: column;
    text-align: center;
    padding-bottom: 20px;
  }

  .profile-img {
    float: left;
    width: 100%;
    height: 200px;
  }

  .profile-img img {
    position: relative;
    height: 200px;
    width: 200px;
    left: 0px;
  }

  .profile-nav-info {
    text-align: center;
    margin-top: 55px;
  }

  .profile-option {
    right: 20px;
    top: 75%;
    transform: translateY(50%);
  }

  .main-bd {
    flex-direction: column;
    padding-right: 0;
  }

  .profile-side {
    width: 100%;
    text-align: center;
    padding: 20px;
    margin: 5px 0;
  }

  .profile-nav-info .address {
    justify-content: center;
  }

  .user-rating {
    justify-content: center;
  }
}

@media (max-width: 400px) {
  body {
    margin: ;
  }

  .profile-header h3 {
  }

  .profile-option {
    width: 30px;
    height: 30px;
    position: absolute;
    right: 15px;
    top: 83%;
  }

  .profile-option .notification .alert-message {
    top: -3px;
    right: -4px;
    padding: 4px;
    height: 15px;
    width: 15px;
    font-size: 0.7rem;
  }

  .profile-nav-info h3 {
    font-size: 1.9rem;
  }

  .profile-nav-info .address p,
  .profile-nav-info .address span {
    font-size: 0.7rem;
  }
}
#see-more-bio,
#see-less-bio {
  color: blue;
  cursor: pointer;
  text-transform: lowercase;
}
.tab h1 {
  font-family: "Bree Serif", sans-serif;
  display: flex;
  justify-content: center;
  margin: 20px auto;
}

/* Tab CSS  */
#exTab1 .tab-content {
  color: white;
  background-color: #428bca;
  padding: 5px 15px;
}

#exTab2 h3 {
  color: white;
  background-color: #428bca;
  padding: 5px 15px;
}

/* remove border radius for the tab */

#exTab1 .nav-pills > li > a {
  border-radius: 0;
}

/* change border radius for the tab , apply corners on top*/

#exTab3 .nav-pills > li > a {
  border-radius: 4px 4px 0 0;
}

#exTab3 .tab-content {
  color: white;
  background-color: #428bca;
  padding: 5px 15px;
}

.right-side .tab-content {
  padding: 0 27px;
}

.left-side {
  border-radius: 10px;
  overflow: hidden;
}
.right-side {
  border-radius: 10px;
  overflow: hidden;
}

.attachment {
  margin-bottom: 0 !important;
}
.attachment-container {
  margin-top: 10px;
}

.company-detail {
  margin-top: 10px;
}

.gallery {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 4px;
}

/* .rating-container {
  margin-left: 30px;
} */

.comment-div {
  margin-bottom: 28px;
}

.glyphicon {
  margin-right: 10px !important;
}

.right-side {
  width: 75%;
  background-color: white;
}

.tab-content > .active {
  display: inline !important;
}

.nav-tabs > li.active > a {
  border: 0 !important;
  border-bottom: 5px solid #35c74a !important;
}

@media screen and (max-width: 900px) {
  .right-side {
    width: 100%;
  }
}


</style>
@endsection
@section('content')
 <div class="container main-wrapper">
      <div class="main-bd">
        <div class="left-side">
          <div class="profile-header">
            <div class="profile-img">
              <img
                src="{{asset($companyProfile->logo ?? '')}}"
                width="200"
                alt="Profile Image"
              />
            </div>
            <div class="profile-nav-info">
              <h3 class="user-name">{{$companyProfile->company_name ?? ''}}</h3>
              <div class="address">
                <p id="state" class="state">{{$companyProfile->company_address ?? ''}}</p>
              </div>
            </div>
          </div>
          <div class="profile-side">
            <p class="mobile-no">
              <span
                class="glyphicon glyphicon-earphone"
                style="color: dodgerblue"
              ></span>
              {{$companyProfile->phone ?? ''}}
            </p>
            <p class="user-mail">
              <span
                class="glyphicon glyphicon-envelope"
                style="color: dodgerblue"
              ></span>
              {{$companyProfile->comapny_email ?? ''}}
            </p>
            <div class="user-bio">
              <h3>Company Information</h3>
              <p class="bio" style="color: rgba(0, 0, 0, 0.5)">
                {{substr($companyProfile->company_description ?? '',0,100)}}
              </p>
            </div>
            <div class="user-bio">
              <h3>Company Rating</h3>
              <div class="user-rating">
                <h3 class="rating">{{number_format($avgratings, 1)}}</h3>
                <div class="rate">
                  <div class="star-outer">
                    <!-- <div class="star-inner"> -->
                    <span class="rating-container">
                       @for($i=0;$i< round($avgratings);$i++)
                        <span class="glyphicon glyphicon-star"></span>
                        @endfor
                        @for($j=0; $j < 5-$i; $j++)
                        <span class="glyphicon glyphicon-star-empty"></span>
                        @endfor
                    </span>
                    <!-- </div> -->
                  </div>
                  <span class="no-of-user-rate"
                    ><span>{{count($ratings)}}</span>&nbsp;&nbsp;reviews</span
                  >
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="right-side">
          <ul class="nav nav-tabs">
            <li class="nav-item active">
              <a class="nav-link active" data-toggle="tab" href="#tab1"
                >Company Details</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#tab2"
                >Designer List</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#tab3">Reviews</a>
            </li>
          </ul>

          <div class="tab-content">
            <div id="tab1" class="container tab-pane active">
              <br />
              <div class="row">
                <div class="col-lg-8">
                  <strong>Date of Establishment : {{$companyProfile->year_established ?? ''}}</strong>
                  <br />
                  <div class="attachment-container">
                    <strong>Attachments:</strong><br />
                    <p class="attachment">
                        <a href="{{asset($companyProfile->company_cv ?? '')}}" target="_blank">Preview CV</a>
                    </p>
                    <p class="attachment">
                      <a href="{{asset($companyProfile->indemnity_insurance ?? '')}}" target="_blank">Preview indemnity Insurance</a>
                    </p>
                  </div>
                </div>
                <div class="col-lg-3">
                  <strong>Website link:</strong>
                  <a href="{{$companyProfile->website ?? ''}}">{{$companyProfile->website ?? ''}}</a>
                </div>
              </div>
              <div class="row company-detail">
                <div class="col-lg-12">
                  <strong class="company-detail--title">Company Detail</strong>
                  <p>
                    {{$companyProfile->company_description ?? ''}}
                  </p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="attachment-container">
                    <strong>Other Documents:</strong><br />
                    
                         @foreach($companyProfile->otherdocs as $doc)
                         @php 
                            $n = strrpos($doc->file, '.');
                            $ext=substr($doc->file, $n+1);
                         
                         @endphp
                         @if($ext=='png' || $ext=='jpg' || $ext=='jpeg')
                         @else
                          <p class="attachment"><a href="{{asset($doc->file)}}">Attachment</a></p>
                         @endif
                        @endforeach
                        
                  </div>
                </div>
                <div class="col-md-6">

                  <div class="gallery">
                   @foreach($companyProfile->otherdocs as $doc)
                         @php 
                            $n = strrpos($doc->file, '.');
                            $ext=substr($doc->file, $n+1);
                         
                         @endphp
                         @if($ext=='png' || $ext=='jpg' || $ext=='jpeg')
                          <img src="{{asset($doc->file)}}" alt=""/>
                         @endif
                        @endforeach
                        
                  </div>
                </div>
              </div>
            </div>
            <div id="tab2" class="container tab-pane fade">
              <br />
              <table class="table">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>User Name</th>
                    <th>Email</th>
                    @if($companyProfile->nomination_link_check)
                    <th>Nomination Link</th>
                    @endif
                  </tr>
                </thead>
                <tbody>
                  @foreach($designerList as $list)
                  <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$list->name}}</td>
                    <td>{{$list->email}}</td>
                    @if($companyProfile->nomination_link_check)
                    <td>
                        <a href="{{asset('pdf/'.$list->usernomination->pdf_url)}}" target="_blank">PDF</a>
                    </td>
                    @endif
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div id="tab3" class="container tab-pane fade">
              @foreach($ratings as $rate)
              <div class="comment-div">
                <br />
                <strong>{{$rate->user->name ?? ''}}:</strong>
                <span class="rating-container">
                    @for($i=0;$i<$rate->star_rating;$i++)
                    <span class="glyphicon glyphicon-star"></span>
                    @endfor
                    @for($j=0; $j < 5-$i; $j++)
                    <span class="glyphicon glyphicon-star-empty"></span>
                    @endfor
                </span>
                <p class="comment">
                  {{$rate->comments}}
                </p>
              </div>
              @endforeach
              
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection
@section('scripts')
  
@endsection
