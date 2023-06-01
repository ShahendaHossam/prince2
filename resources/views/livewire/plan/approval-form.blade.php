<main>
    <div>
        <style>
            .wrapper {
                position: relative;
                width: 400px;
                height: 200px;
                -moz-user-select: none;
                -webkit-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }

            .signature-pad {
                position: absolute;
                left: 0;
                top: 0;
                width: 400px;
                height: 200px;
                background-color: white;
                border: 1px solid grey;
                border-radius: 4px;
            }
        </style>
        <div class="py-4">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                    <li class="breadcrumb-item">
                        <a href="#">
                            <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Plan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Approval</li>
                </ol>
            </nav>
            <div class="d-flex justify-content-between w-100 flex-wrap">
                <div class="mb-3 mb-lg-0">
                    <h1 class="h4">Plan</h1>
                    <p class="mb-0">Create Approval</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 mb-4">
                <div class="card border-0 shadow components-section">
                    <div class="card-body">
                        <div class="mb-2">
                            <button type="submit" class="btn btn-primary" wire:click="back()" value="">
                            <span class="fas fa-arrow-left"></span> {{ __('Back') }}
                            </button>
                        </div>
                        <div class="row mb-4">
                            <!-- Form -->
                            {{--Date--}}
                            <div class="col-6 mb-4">
                                <label>{{ __('Date') }}</label>
                                <input wire:model.lazy="plan.approval_date" type="date" name="plan.approval_date" id="plan.approval_date" class="form-control">
                                @error('plan.approval_date')
                                <span class="p-4 mb-4 text-sm text-red-800 rounded-lg text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- End of Form -->
                            <!-- Form -->
                            {{--Name--}}
                            <div class="col-6 mb-4">
                                <label>{{ __('Name') }}</label>
                                <input wire:model.lazy="plan.name" type="text" name="plan.name" id="plan.name" class="form-control">
                                @error('plan.name')
                                <span class="p-4 mb-4 text-sm text-red-800 rounded-lg text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- End of Form -->
                            <!-- Form -->
                            {{--Notes--}}
                            <div>
                                <label>{{ __('Notes') }}</label>
                                <textarea class="form-control" wire:model.lazy="plan.notes" id="plan.notes" name="plan.notes" rows="4" cols="50"></textarea>
                                @error('plan.notes')
                                <span class="p-4 mb-4 text-sm text-red-800 rounded-lg text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- End of Form -->
                            <!-- Form -->
                            {{--Signature--}}
                            <div x-data="signaturePad()" class="float-left">
                                <label class="" for="">Signature:</label>
                                <br />
                                <div class="wrapper mb-2">
                                    <canvas x-ref="signature_canvas" class="signature-pad" width=400 height=200 wire:model.lazy="signature"></canvas>
                                </div>

                                <button x-on:click="upload" class="btn btn-success">Save Signature</button>
                                <button x-on:click="misazero" class="btn btn-danger">Clean Signature</button>
                                <!-- <button x-on:click="next"></button> -->

                                <br />
                                {{-- <button id="clear" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Clear Signature</button>
                             <textarea id="signature64" name="signed" wire:model.lazy="plan.signature"></textarea>  --}}
                            </div>
                            <!-- End of Form -->
                        </div>
                        <div class="text-end my-2">
                            <button type="submit" class="btn btn-secondary" wire:click="next()" value="">
                                {{ __('Save & Next') }} <span class="fas fa-arrow-right">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('signaturePad', () => ({
                    signaturePadIntance: null,
                    init() {
                        this.signaturePadIntance = new SignaturePad(this.$refs.signature_canvas);
                    },
                    misazero() {
                        // clean the canvas
                        this.signaturePadIntance = null;
                        this.signaturePadIntance = new SignaturePad(this.$refs.signature_canvas);
                    },
                    upload() {
                        @this.set('signature', this.signaturePadIntance.toDataURL('image/png'));
                        @this.call('submit');
                    }
                }))
            })
        </script>
    </div>
</main>