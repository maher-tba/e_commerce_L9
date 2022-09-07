<table class="table table-striped">
    <thead>
    <tr>
        <th class="text-center" scope="col">الناشر</th>
        <th class="text-center" scope="col">الصنف</th>
        <th class="text-center" scope="col">صاحب الصنف</th>
        <th class="text-center" scope="col"></th>
    </tr>
    </thead>
    @foreach ($categories as $category)
        <tr>
            <td class="text-center" >
                {{ $category->author }}
            </td>
            <td class="text-center" >
                @if ($category->is_hidden)
                    <s>{{ $category->title }}</s>
                @else
                    {{ $category->title }}
                @endif
            </td>
            {{--                                    todo--}}
            {{--                                    fixed performance issue extra query not needed                                  --}}
            <td class="text-center" >
                {{ $category->user->name }}
            </td>
            <td class="text-right">
                <div class="row float-end">
                    <!-- <div class="col-sm-4">
                        @if (! $category->is_hidden)
                            <form method="POST" action="{{ route('user.categories.update', $category->id) }}">
                                @csrf
                                @method('PUT')
                                <button type="submit" class=" btn btn-success btn-sm text-white"><strong >انجزت</strong></button>
                            </form>
                        @endif
                    </div>
                    @can('update',$category)
                        <div class="col-sm-4">
                            <form method="POST" action="{{ route('user.categories.edit', $category->id) }}">
                                @csrf
                                @method('GET')
                                <button type="submit" class=" btn btn-info btn-sm text-white"><strong >تحرير</strong></button>
                            </form>
                        </div>
                    @endcan -->
                    @can('delete',$category)
                        <div class="col-sm-4">
                            <form method="POST" action="{{ route('user.categories.destroy', $category->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class=" btn btn-danger btn-sm text-white "><strong >حذف</strong></button>
                            </form>
                        </div>
                    @endcan
                </div>

            </td>
        </tr>
    @endforeach
</table>
