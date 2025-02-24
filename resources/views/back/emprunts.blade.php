@extends('base')

@section('main')

    <div class="font-sans h-screen overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-100 whitespace-nowrap">
            <tr>
                <th class="p-4 text-left text-xs font-semibold text-gray-800">
                    Name
                </th>
                <th class="p-4 text-left text-xs font-semibold text-gray-800">
                    Email
                </th>
                <th class="p-4 text-left text-xs font-semibold text-gray-800">
                    Phone
                </th>
                <th class="p-4 text-left text-xs font-semibold text-gray-800">
                    book title
                </th>
                <th class="p-4 text-left text-xs font-semibold text-gray-800">
                    book author
                </th>
                <th class="p-4 text-left text-xs font-semibold text-gray-800">
                    date & time
                </th>
                <th class="p-4 text-left text-xs font-semibold text-gray-800">
                    status
                </th>
            </tr>
            </thead>
            <tbody class="whitespace-nowrap">
            @if(count($reservations)>0)
            @foreach($reservations as $reserve)

                <tr class="hover:bg-gray-50">
                    <td class="p-4 text-[15px] text-gray-800"> {{$reserve->firsName}} {{$reserve->lastName}}
                    </td>
                    <td class="p-4 text-[15px] text-gray-800">
                        {{$reserve->email}}
                    </td>
                    <td class="p-4 text-[15px] text-gray-800">
                        {{$reserve->phone}}
                    </td>
                    <td class="p-4 text-[15px] text-gray-800">
                        {{$reserve->title}}
                    </td>
                    <td class="p-4 text-[15px] text-gray-800">
                        {{$reserve->author}}
                    </td>

                    <td class="p-4 text-[15px] text-gray-800">
                        {{$reserve->created_reserv}}
                    </td>

                    <?php

                        $currentDate = new DateTime(); // Current date
                        $createdAt = new DateTime($reserve->created_reserv);
                        $diff = $currentDate->diff($createdAt);

                        $daysDifference = $diff->days;
                        $hoursDifference = $diff->h;
                        $minutDifference = $diff->i;
                        $secondsDifference = $diff->s;

                        ?>
                    @if($daysDifference > 15)
                        <td class="p-4 text-[15px] text-red-500">

                    @else

                    <td class="p-4 text-[15px] text-green-500">

                        @endif
                        @if($daysDifference > 0)
                            {{$daysDifference}} d {{$hoursDifference}} h {{$minutDifference}} m {{$secondsDifference}}s.
                        @else
                            {{$hoursDifference}} h {{$secondsDifference}}s
                            {{$minutDifference}} m
                        @endif

                    </td>



            @endforeach
                        @else
                            <div class="flex justify-center items-center min-h-screen bg-gray-100">
                                <p class="flex justify-center text-5xl">you don't have any reservations here</p>
                            </div>
                @endif

            </tbody>

        </table>
    </div>
@endsection
