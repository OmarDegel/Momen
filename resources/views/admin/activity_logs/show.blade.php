@extends('admin.layouts.app')

@section('title', __('site.activity_log_details'))

@section('content')

    <div class="container mt-4">
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <p><strong>{{ __('site.user') }}:</strong> {{ $activity->causer?->name_first }}
                    {{ $activity->causer?->name_last ?? 'System' }}</p>
                <p><strong>{{ __('site.model') }}:</strong> {{ class_basename($activity->subject_type) }}</p>
                <p><strong> id :</strong> {{ $activity->subject_id }}</p>
                <p><strong>{{ __('site.date') }}:</strong> {{ $activity->created_at->format('Y-m-d H:i') }}</p>
            </div>
        </div>

        {{-- حالة التحديث --}}
        @if ($activity->description === 'updated' && isset($activity->properties['old']))
            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-info text-white">
                    <strong>{{ __('site.changes') }}</strong>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr class="text-center">
                                <th>{{ __('site.field') }}</th>
                                <th>{{ __('site.old_value') }}</th>
                                <th>{{ __('site.new_value') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($activity->properties['attributes'] ?? [] as $key => $newValue)
                                @php
                                    $oldValue = $activity->properties['old'][$key] ?? null;
                                @endphp
                                @if ($oldValue !== $newValue && !in_array($key, ['created_at', 'updated_at']))
                                    <tr class="text-center">
                                        <td><strong>{{ $key }}</strong></td>
                                        <td class="text-danger">{{ $oldValue ?? '-' }}</td>
                                        <td class="text-success">{{ $newValue ?? '-' }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    @if (
                        $activity->subject &&
                            Route::has('dashboard.' . Str::plural(strtolower(class_basename($activity->subject_type))) . '.show'))
                        <div class="text-end mt-3">
                            <a href="{{ route('dashboard.' . Str::plural(strtolower(class_basename($activity->subject_type))) . '.show', $activity->subject_id) }}"
                                class="btn btn-primary">
                                <i class="fas fa-eye me-1"></i> {{ __('site.show') }}
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        @endif

        {{-- حالة الإنشاء --}}
        @if ($activity->description === 'created' && isset($activity->properties['attributes']))
            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-success text-white">
                    <strong>{{ __('site.created_data') }}</strong>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr class="text-center">
                                <th>{{ __('site.field') }}</th>
                                <th>{{ __('site.value') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($activity->properties['attributes'] as $key => $value)
                                @if (!in_array($key, ['created_at', 'updated_at']))
                                    <tr class="text-center">
                                        <td><strong>{{ $key }}</strong></td>
                                        <td>{{ $value ?? '-' }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>

                    @if (
                        $activity->subject &&
                            Route::has('dashboard.' . Str::plural(strtolower(class_basename($activity->subject_type))) . '.show'))
                        <div class="text-end mt-3">
                            <a href="{{ route('dashboard.' . Str::plural(strtolower(class_basename($activity->subject_type))) . '.show', $activity->subject_id) }}"
                                class="btn btn-primary">
                                <i class="fas fa-eye me-1"></i> {{ __('site.show') }}
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        @endif
    </div>

@endsection
