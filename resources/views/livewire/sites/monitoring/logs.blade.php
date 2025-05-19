<div class="p-6 space-y-6">
    <!-- Judul -->
    <h1 class="text-2xl font-semibold text-gray-800">Logs</h1>

    <!-- Tabel -->
    <div class="overflow-x-auto border border-gray-300 rounded-md">

        <table class="min-w-full text-sm text-left text-gray-700">
            <thead class="bg-gray-150 text-gray-600 font-medium">
                <tr>
                    <th class="px-3 py-3">NAME</th>
                    <th class="px-3 py-3">USER</th>
                    <th class="px-3 py-3">IP</th>
                    <th class="px-3 py-3">DATA</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($logs as $log)
                    <tr>
                        <td class="px-3 py-3">{{ $log->action . ' ' . $log->model }}</td>
                        <td class="px-3 py-3">{{ $log->user ? $log->user->name : 'System' }}</td>
                        <td class="px-3 py-3">{{ $log->ip_address }}</td>
                        <td class="px-3 py-3">
                            <div class="max-h-32 overflow-y-auto">
                                @if (is_array($log->new_data) && count($log->new_data) > 0)
                                    <ul class="list-disc list-inside">
                                        @foreach ($log->new_data as $key => $value)
                                            @if (!is_array($value))
                                                <li><strong>{{ $key }}</strong>: {{ Str::limit($value, 50) }}
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                @else
                                    <span class="text-gray-500">No data available</span>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Paginate -->
        <div class="p-4 border-t border-gray-300 bg-white">
            {{ $logs->links('vendor.pagination.tailwind') }}
        </div>
    </div>
</div>
