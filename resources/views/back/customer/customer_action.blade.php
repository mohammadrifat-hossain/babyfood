<div class="text-right">
    <a class="btn btn-success btn-sm" href="{{route('back.customers.edit', $user->id)}}"><i class="fas fa-edit"></i></a>

    <form class="d-inline-block" action="{{route('back.customers.destroy', $user->id)}}" method="POST">
        @method('DELETE')
        @csrf

        <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure to remove?')"><i class="fas fa-trash"></i></button>
    </form>

    @if($user->status == 0)
    <a onclick="return confirm('Are you sure to un-suspend?');" class="btn btn-info btn-sm" href="{{route('back.customers.action', ['user' => $user->id, 'action' => 1])}}">Un-Suspend</a>
    @else
    <a onclick="return confirm('Are you sure to suspend?');" class="btn btn-warning btn-sm" href="{{route('back.customers.action', ['user' => $user->id, 'action' => 0])}}">Suspend</a>
    @endif
</div>
