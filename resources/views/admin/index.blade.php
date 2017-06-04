@extends('layouts.admin.master')

@section('styles')
  <link rel="stylesheet" href="{{URL::to('css/modal.css')}}">
@endsection

@section('content')
  <div class="container">
    @include('includes.info-box')
      <div class="card">
        <header>
          <nav>
            <ul>
              <li><a href="#" class="btn">New Post</a></li>
              <li><a href="#" class="btn">Show all Posts</a></li>
            </ul>
          </nav>
        </header>
        <section>
          <ul>
            <!-- If no posts -->
            <li>No Posts</li>
            <!-- If Posts -->
            <li>
              <article class="">
              <div class="post-info">
                  <h3>Post Title</h3>
                  <span class="info">Author | date</span>
                  <div class="edit">
                    <nav>
                      <ul>
                        <li><a href="#">View Post</a></li>
                        <li><a href="#">Edit</a></li>
                        <li><a href="#" class="danger">Delete</a></li>
                      </ul>
                    </nav>
                  </div>
              </div>
              </article>
            </li>
          </ul>
        </section>
      </div>

      <!-- Message card -->
      <div class="card">
        <header>
          <nav>
            <ul>
              <li><a href="#" class="btn">Show all Messages</a></li>
            </ul>
          </nav>
        </header>
        <section>
          <ul>
            <!-- If no posts -->
            <li>No Message</li>
            <!-- If Posts -->
            <li>
              <article data-message="body" data-id="ID">
              <div class="message-info">
                  <h3>Message Title</h3>
                  <span class="info">Sender: .. | date</span>
                  <div class="edit">
                    <nav>
                      <ul>
                        <li><a href="#">View</a></li>
                        <li><a href="#" class="danger">Delete</a></li>
                      </ul>
                    </nav>
                  </div>
              </div>
              </article>
            </li>
          </ul>
        </section>
      </div>
  </div>

  <!-- model -->
  <div class="modal" id="contact-message-info">
    <button class="btn" name="modal-close">Close</button>
  </div>
@endsection

@section('scripts')
  <script type="text/javascript">
    var token = "{{Session::token()}}";
  </script>
  <script type="text/javascript" scr="{{ URL::To('js/modal.js')}}">
  <script type="text/javascript" scr="{{ URL::To('js/cantact_message.js')}}">

  </script>
@endsection
