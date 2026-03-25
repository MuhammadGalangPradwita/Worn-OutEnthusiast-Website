@extends('admin.layouts.app')
@section('title', 'Event Timeline')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h2 class="font-display font-bold text-xl text-white">Event Timeline</h2>
        <a href="{{ route('admin.timelines.create') }}"
            class="px-4 py-2 bg-denim-500 hover:bg-denim-400 text-white text-sm font-medium rounded-lg transition-colors">+
            Add Milestone</a>
    </div>

    <div class="bg-denim-800/50 border border-denim-600/20 rounded-xl overflow-hidden">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-denim-700/30">
                    <th class="text-left px-6 py-4 text-denim-400 font-medium">Order</th>
                    <th class="text-left px-6 py-4 text-denim-400 font-medium">Title</th>
                    <th class="text-left px-6 py-4 text-denim-400 font-medium">Date</th>
                    <th class="text-left px-6 py-4 text-denim-400 font-medium">Status</th>
                    <th class="text-right px-6 py-4 text-denim-400 font-medium">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($timelines as $timeline)
                    <tr class="border-b border-denim-700/20 hover:bg-denim-700/10 transition-colors">
                        <td class="px-6 py-4 text-denim-300">{{ $timeline->sort_order }}</td>
                        <td class="px-6 py-4 text-white font-medium">{{ $timeline->title }}</td>
                        <td class="px-6 py-4 text-denim-300">{{ $timeline->date }}</td>
                        <td class="px-6 py-4">
                            <span
                                class="px-2 py-1 rounded-full text-xs {{ $timeline->is_active ? 'bg-green-500/10 text-green-400' : 'bg-denim-700/30 text-denim-400' }}">
                                {{ $timeline->is_active ? 'Active / Past' : 'Upcoming' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.timelines.edit', $timeline) }}"
                                    class="px-3 py-1.5 bg-denim-700/30 text-denim-300 text-xs rounded-lg hover:bg-denim-700/50 transition-colors">Edit</a>
                                <form action="{{ route('admin.timelines.destroy', $timeline) }}" method="POST"
                                    onsubmit="return confirm('Delete this milestone?')">
                                    @csrf @method('DELETE')
                                    <button type="submit"
                                        class="px-3 py-1.5 bg-red-500/10 text-red-400 text-xs rounded-lg hover:bg-red-500/20 transition-colors">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-denim-400">No timeline milestones yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4 p-4 bg-denim-800/30 border border-denim-600/10 rounded-lg">
        <p class="text-denim-400 text-xs">💡 <strong class="text-denim-300">Tip:</strong> Set milestones as "Active" to
            highlight them on the public page. Use sort order to control the display sequence.</p>
    </div>
@endsection