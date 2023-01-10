<div wire:poll>
  @foreach($order->discussions as $discussion) 
  <div class="discussion-wrap pt-4">
    <div class="discussion-pf-wrap d-flex align-items-center">
      <img
          class="mr-2"
          src="/images/discussion-img.png"
          alt="Generic placeholder image"
        />
    <h5 class="discussion-pf-name">{{ $discussion->discussable->name ?? $discussion->discussable->first_name }}</h5>
</div>
    <div class="row m-0">
        <div class="col-lg-8 p-0">
            <p class="discussion-content">{!! $discussion->message !!}</p>
        </div>
        <div class="col-lg-4 p-0 d-flex justify-content-end align-items-end">
            <div class="">
            <p class="discussion-date">{{ $discussion->created_at }}</p>
        </div>
        </div>
    </div>
    @foreach($discussion->attachments as $attachment)

    <div class="row m-0">
      <div class="col-lg-12 p-0">
        <h5 class="attachment-hd">attachment</h5>
        <div class="attachment-wrap">
          <div class=" d-flex justify-content-between">
          <div class=" d-flex">
          <img src="/images/file.svg" alt="" class="file-icon">
          <h6 class="file-hd">Your-Project-File.png</h6>
        </div>
        {{-- <a href="javascript:;" wire:click="exportAttachment({{$discussion->id}}, {{$attachment->id}})">{{ $attachment->filename }}</a> --}}
          <a href="javascript:;" wire:click="exportAttachment({{$discussion->id}}, {{$attachment->id}})" class="download-btn">download {{ $attachment->filename }}</a>
        
      </div>
        </div>
      </div>
    </div>
    @endforeach
</div>
@endforeach
</div>

    {{-- @foreach($order->discussions as $discussion) 

<div class="row">
    <div class="col">
      <div class="media">
        <img
          class="mr-2"
          src="/images/discussion-img.png"
          alt="Generic placeholder image"
        />
        <div class="media-body">
          <h5 class="mt-0">{{ $discussion->discussable->name ?? $discussion->discussable->first_name }}</h5>
          <p>Developer</p>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-7 ml-5">
      <span class="discussion-message ml-3"
        >{!! $discussion->message !!}</span
      >
    </div>
  </div>
  <div class="border-bottom mt-3"></div>

  @endforeach --}}


  {{-- <div class="mb-5">
      <div wire:poll.keep-alive>
                        <div class="row pt-5 justify-content-center">
                            <div class="col-lg-7">
           @foreach($order->discussions as $discussion) 

                                <div class="media d-flex mt-3">
                                    <img class="mr-3" src="/images/client.jpg" style="width: 50px;"  alt="Generic placeholder image">
                                    <div class="media-body">
                                    <h5 class="user-discussion-heading mt-0">{{ $discussion->discussable->name ?? $discussion->discussable->first_name }}</h5>
                                    <p>comment on Sep 17,12:39</p>
                                    </div>
                                   
                                </div>    
                                <div class="discussion-message">
                                    <p class="pl-3 pt-3">{!! $discussion->message !!}
                                    </div>

                                @foreach($discussion->attachments as $attachment)
                                <h3 class="pt-3">attachments</h3>
                                <div class="user-upload-file">
                                <a href="javascript:;" wire:click="exportAttachment({{$discussion->id}}, {{$attachment->id}})">{{ $attachment->filename }}</a>
                                    
                                </div>
                        @endforeach

                        @endforeach
                            </div>
                        </div>
  </div>
</div> --}}
