<table class="table table-params">
    <tbody>
    <tr>
        <td class="text-right"><strong>Name</strong></td>
        <td>{{ $item->name }}</td>
    </tr>
    @if(!is_null($item->category_id))
        <tr>
            <td class="text-right"><strong>Email</strong></td>
            <td>{{ $item->email }}</td>
        </tr>
    @endif
    @foreach($item->certifictes as $certificate)
        <tr>
            <td class="text-right"><strong>Certificate</strong></td>
            <td>
                <a href="{{ asset('uploads/files/'.$certificate->certificate_url) }}" class="btn"></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>