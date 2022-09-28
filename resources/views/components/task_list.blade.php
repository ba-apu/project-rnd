<table class="table table-condensed">
    <tr>
        <td>খাত ভিত্তিক অনুমোদিত ব্যায়</td>
        <td></td>
    </tr>
    @php
    $c=1;
    @endphp
    @forelse($data as $key=>$value)
    <tr>
        <td> {{ english_to_bangla($c)."। ".$key  }} </td>
        <td>
            @foreach($value as $r)
                {{ english_to_bangla(\App\Common::bdtFormat($r)) }} টাকা
            @endforeach
        </td>
    </tr>
        @php
            $c++;
        @endphp
    @empty
        No data found
    @endforelse
</table>