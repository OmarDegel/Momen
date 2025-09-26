<thead class="border-top">
    <tr class>
        @foreach($columns as $column)
        <th class="text-lg-center">{{ __($column)}}</th>
        @endforeach
    </tr>
</thead>
