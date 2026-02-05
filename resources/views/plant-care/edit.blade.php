@extends('layouts.public')

@push('styles')
<style>
/* Hide sidebar for plant care edit page */
body.with-sidebar {
    display: block !important;
}
body.with-sidebar .dashboard-flex {
    display: block !important;
}
body.with-sidebar .dashboard-flex .sidebar {
    display: none !important;
}
body.with-sidebar .dashboard-flex .main-content {
    margin-left: 0 !important;
    width: 100% !important;
    padding-left: 0 !important;
}
/* White background for form */
body {
    background-color: #f8f9fa !important;
}
</style>
@endpush

@section('content')
<div class="container-fluid px-4 py-4">
    <div class="mb-4">
        @if(request()->query('from') === 'admin')
            <a href="{{ route('plant-care.admin') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left"></i> Back to Plant Guide Management
            </a>
        @else
            <a href="{{ route('plant-care.show', $plant->id) }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left"></i> Back
            </a>
        @endif
    </div>

    <h1 class="mb-4">Edit Care Information: {{ $plant->name }}</h1>

    <form action="{{ route('plant-care.update', $plant->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="from" value="{{ request()->query('from', 'public') }}">

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label"><i class="fas fa-tint text-primary"></i> Watering</label>
                <textarea name="care_watering" class="form-control" rows="3" placeholder="e.g., Water 2-3 times per week, allow soil to dry between waterings">{{ old('care_watering', $plant->care_watering) }}</textarea>
            </div>

            <div class="col-md-6">
                <label class="form-label"><i class="fas fa-sun text-warning"></i> Sunlight</label>
                <textarea name="care_sunlight" class="form-control" rows="3" placeholder="e.g., Bright indirect light, avoid direct afternoon sun">{{ old('care_sunlight', $plant->care_sunlight) }}</textarea>
            </div>

            <div class="col-md-6">
                <label class="form-label"><i class="fas fa-seedling text-success"></i> Soil</label>
                <textarea name="care_soil" class="form-control" rows="3" placeholder="e.g., Well-draining potting mix, slightly acidic pH">{{ old('care_soil', $plant->care_soil) }}</textarea>
            </div>

            <div class="col-md-6">
                <label class="form-label"><i class="fas fa-thermometer-half text-danger"></i> Temperature</label>
                <textarea name="care_temperature" class="form-control" rows="3" placeholder="e.g., 18-24°C, protect from cold drafts">{{ old('care_temperature', $plant->care_temperature) }}</textarea>
            </div>

            <div class="col-md-6">
                <label class="form-label"><i class="fas fa-cloud text-info"></i> Humidity</label>
                <textarea name="care_humidity" class="form-control" rows="3" placeholder="e.g., 40-60%, mist occasionally">{{ old('care_humidity', $plant->care_humidity) }}</textarea>
            </div>

            <div class="col-md-6">
                <label class="form-label"><i class="fas fa-flask"></i> Fertilizing</label>
                <textarea name="care_fertilizing" class="form-control" rows="3" placeholder="e.g., Monthly during growing season with balanced fertilizer">{{ old('care_fertilizing', $plant->care_fertilizing) }}</textarea>
            </div>

            <div class="col-md-6">
                <label class="form-label"><i class="fas fa-cut"></i> Pruning</label>
                <textarea name="care_pruning" class="form-control" rows="3" placeholder="e.g., Remove dead leaves, prune in spring">{{ old('care_pruning', $plant->care_pruning) }}</textarea>
            </div>

            <div class="col-md-6">
                <label class="form-label"><i class="fas fa-clone"></i> Propagation</label>
                <textarea name="care_propagation" class="form-control" rows="3" placeholder="e.g., Stem cuttings in water or soil">{{ old('care_propagation', $plant->care_propagation) }}</textarea>
            </div>

            <div class="col-md-6">
                <label class="form-label"><i class="fas fa-bug text-danger"></i> Common Pests & Issues</label>
                <textarea name="care_pests" class="form-control" rows="3" placeholder="e.g., Spider mites, root rot from overwatering">{{ old('care_pests', $plant->care_pests) }}</textarea>
            </div>

            <div class="col-md-6">
                <label class="form-label"><i class="fas fa-chart-line"></i> Growth Rate</label>
                <textarea name="care_growth_rate" class="form-control" rows="3" placeholder="e.g., Moderate, reaches full size in 2-3 years">{{ old('care_growth_rate', $plant->care_growth_rate) }}</textarea>
            </div>

            <div class="col-md-6">
                <label class="form-label"><i class="fas fa-exclamation-triangle text-warning"></i> Toxicity</label>
                <textarea name="care_toxicity" class="form-control" rows="3" placeholder="e.g., Toxic to pets, keep away from cats and dogs">{{ old('care_toxicity', $plant->care_toxicity) }}</textarea>
            </div>

            <div class="col-12">
                <label class="form-label"><i class="fas fa-sticky-note"></i> Additional Notes</label>
                <textarea name="care_notes" class="form-control" rows="4" placeholder="Any other care tips or special requirements">{{ old('care_notes', $plant->care_notes) }}</textarea>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Save Care Information
                </button>
                @if(request()->query('from') === 'admin')
                    <a href="{{ route('plant-care.admin') }}" class="btn btn-secondary">Cancel</a>
                @else
                    <a href="{{ route('plant-care.show', $plant->id) }}" class="btn btn-secondary">Cancel</a>
                @endif
            </div>
        </div>
    </form>
</div>
@endsection
