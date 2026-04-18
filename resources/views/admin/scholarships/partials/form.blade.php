<section class="panel-card">
    <form method="POST" action="{{ $action }}" class="stack-form">
        @csrf
        @if ($method !== 'POST')
            @method($method)
        @endif

        <div class="grid two-col">
            <div>
                <label>Title</label>
                <input type="text" name="title" value="{{ old('title', optional($scholarship)->title) }}" required>
            </div>
            <div>
                <label>Category</label>
                <input type="text" name="category" value="{{ old('category', optional($scholarship)->category) }}" required>
            </div>
        </div>

        <div class="grid two-col">
            <div>
                <label>Amount</label>
                <input type="number" step="0.01" min="0" name="amount" value="{{ old('amount', optional($scholarship)->amount) }}" required>
            </div>
            <div>
                <label>Slots</label>
                <input type="number" min="1" name="slots" value="{{ old('slots', optional($scholarship)->slots) }}" required>
            </div>
        </div>

        <div class="grid two-col">
            <div>
                <label>Deadline</label>
                <input type="date" name="deadline" value="{{ old('deadline', optional(optional($scholarship)->deadline)->format('Y-m-d')) }}" required>
            </div>
            <div>
                <label>Status</label>
                <select name="status">
                    @foreach (['draft', 'open', 'reviewing', 'closed'] as $status)
                        <option value="{{ $status }}" @selected(old('status', optional($scholarship)->status ?? 'draft') === $status)>{{ ucfirst($status) }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <label>Description</label>
        <textarea name="description" rows="5" required>{{ old('description', optional($scholarship)->description) }}</textarea>

        <label>Requirements</label>
        <textarea name="requirements" rows="5" placeholder="Transcript, certificate of registration, ID...">{{ old('requirements', optional($scholarship)->requirements) }}</textarea>

        <div class="inline-actions">
            <button type="submit" class="btn btn-primary">Save Scholarship</button>
            <a href="{{ route('admin.scholarships.index') }}" class="btn btn-outline">Cancel</a>
        </div>
    </form>
</section>
