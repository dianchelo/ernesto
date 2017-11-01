@extends('main')

@section('content')

<div class="row">
	<div class="col-md-12">
		<h4>Groups</h4>
		
		@if($groups->count() >0)
		<h6>Below groups are displayed, optional there are groups nested within groups and items nested within groups</h6>
		<ul>
			@foreach($groups as $group)
				@if(!empty($group->mother()))
					<li>{{ $group->name }}</li>
				@endif

				@if($group->items()->count() > 0)
				<h6>Items in {{$group->name}}</h6>
					<ul>
					@foreach($group->items()->get() as $item)
						<li>{{ Html::linkRoute('items.show', $item->name, [$item->id]) }}</li>

					@endforeach

					</ul>

				@endif
				
				@if($group->children()->count() > 0)
					<h6>Groups in {{$group->name}}</h6>
					<ul>
						@foreach($group->children()->get() as $big_child)
							<li>{{ $big_child->name }}</li>
							@if($big_child->children()->count() > 0)
								<h6>Groups in {{$big_child->name}}</h6>
								<ul>
									@foreach($big_child->children()->get() as $little_child)
										<li>{{ $little_child->name }}</li>
									@endforeach
								</ul>
							@endif
						@endforeach	
					</ul>
				@endif
			@endforeach
		</ul>
		@else
			<h6>There are no groups to be displayed at this time.</h6>
		@endif

		<h4>Items</h4>
		@if($items->count() > 0)
			<h6>These items do not belong to a group</h6>
			<ul>
				@foreach($items as $item)
					<li>{{ $item->name }}</li>

				@endforeach
			</ul>
		@else
			<h6>There are no items to show at this time.</h6>
		@endif

		<hr>

	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<h4>Create groups</h4>
		{!! Form::open(['route' => 'groups.store', 'class' => 'form-control']) !!}
			{{ csrf_field() }}

    		{{ Form::label('name', 'Group name', ['class' => 'control-label']) }}
    		{{ Form::text('name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}


    		@if(!empty($listGroups->all()))
				{{ Form::label('group_id', 'Optional Group:' , ['class' => 'control-label']) }}
				<select class="form-control" name="group_id">
					<option value="">Don't nest in a other group</option>
					@foreach ($listGroups as $group)
						<option value="{{ $group->id }}">{{ $group->name }}</option>
					@endforeach
					

				</select>
			@endif

			{{ Form::submit('Create Group', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top:20px; margin-bottom:20px;')) }}
		{!! Form::close() !!}
	</div>

	<div class="col-md-6">
		<h4>Create Items</h4>
		{!! Form::open(['route' => 'items.store', 'class' => 'form-control']) !!}
			{{ csrf_field() }}

    		{{ Form::label('name', 'Item name', ['class' => 'control-label']) }}
    		{{ Form::text('name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}

    		@if(!empty($listGroups->all()))
				{{ Form::label('group_id', 'Optional Parent Group:' , ['class' => 'control-label']) }}
				<select class="form-control" name="group_id">
					<option value="">Don't nest in a parent group</option>
					@foreach ($listGroups as $group)
						<option value="{{ $group->id }}">{{ $group->name }}</option>
					@endforeach
				</select>
			@endif

			{{ Form::submit('Create Item', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top:20px; margin-bottom:20px;')) }}
		{!! Form::close() !!}
	</div>
</div>

@endsection


