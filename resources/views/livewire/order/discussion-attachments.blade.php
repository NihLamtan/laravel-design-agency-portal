
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">File Name</th>
      <th scope="col">Uploaded By</th>
      <th scope="col">Uploaded At</th>
      <th scope="col">Download</th>

    </tr>
  </thead>
  <tbody>
    @foreach($order->attachments as $attachment)
  <tr>
      <td>{{ $attachment->filename }}</td>
      <td>{{ $attachment->discussion->discussable->name ?? $attachment->discussion->discussable->first_name }}</td>
      <td>{{ $attachment->created_at->format('d M Y') }}</td>
      <td class="text-center">
          <a href="javascript:;" class="btn btn-outline-success" wire:click="exportAttachment({{$attachment->id}})">Download</a>
      </td>
  </tr>
@endforeach   
  </tbody>
</table>




