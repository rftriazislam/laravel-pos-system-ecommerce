<!-- BEGIN: Vendor JS-->
<script src="{{ asset('public/'.mix('vendors/js/vendors.min.js')) }}"></script>
<!-- BEGIN Vendor JS-->
<!-- BEGIN: Page Vendor JS-->
<script src="{{asset('public/'.mix('vendors/js/ui/jquery.sticky.js'))}}"></script>
<!-- vendor files select 2  -->
<script src="{{ asset('resources/'.mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>

@yield('vendor-script')
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="{{ asset('public/'.mix('js/core/app-menu.js')) }}"></script>
<script src="{{ asset('public/'.mix('js/core/app.js')) }}"></script>

<!-- custome scripts file for user -->
<script src="{{ asset('public/'.mix('js/core/scripts.js')) }}"></script>
<!-- Js for select 2-->
<script src="{{ asset('resources/'.mix('js/scripts/forms/form-select2.js')) }}"></script>
<script>
    var AIZ = AIZ || {};
    AIZ.local = {
        nothing_selected: '{{ translate('Nothing selected') }}',
        nothing_found: '{{ translate('Nothing found') }}',
        choose_file: '{{ translate('Choose file') }}',
        file_selected: '{{ translate('File selected') }}',
        files_selected: '{{ translate('Files selected') }}',
        add_more_files: '{{ translate('Add more files') }}',
        adding_more_files: '{{ translate('Adding more files') }}',
        drop_files_here_paste_or: '{{ translate('Drop files here, paste or') }}',
        browse: '{{ translate('Browse') }}',
        upload_complete: '{{ translate('Upload complete') }}',
        upload_paused: '{{ translate('Upload paused') }}',
        resume_upload: '{{ translate('Resume upload') }}',
        pause_upload: '{{ translate('Pause upload') }}',
        retry_upload: '{{ translate('Retry upload') }}',
        cancel_upload: '{{ translate('Cancel upload') }}',
        uploading: '{{ translate('Uploading') }}',
        processing: '{{ translate('Processing') }}',
        complete: '{{ translate('Complete') }}',
        file: '{{ translate('File') }}',
        files: '{{ translate('Files') }}',
    }
</script>
<!-- Aiz js -->
<script src="{{ asset('public/assets/js/vendors.js') }}" ></script>
<script src="{{ asset('public/assets/js/aiz-core.js') }}" ></script>


@if($configData['blankPage'] === false)
    <script src="{{ asset('public/'.mix('js/scripts/customizer.js')) }}"></script>
@endif
<!-- END: Theme JS-->
<!-- BEGIN: Page JS-->
@yield('script')



<!-- END: Page JS-->
