<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;color: #fff">
@if (trim($slot) === 'EFContact')
<img src="{{ asset('logos/efcontactlogo.png') }}" class="logo" alt="EFContact Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
