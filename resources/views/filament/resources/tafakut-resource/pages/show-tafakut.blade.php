<x-filament-panels::page>
    <div class="space-y-6">

        {{-- Display the Tafakut record details --}}
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <section class="border-b pb-4 mb-4">
                    <h2 class="text-xl font-semibold mb-2">Personal Information</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4"> {{-- Grid for responsive layout --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nama Penuh</label>
                            <input type="text" id="name" disabled
                                value="{{ $record->ahbab->fullname }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                        focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div> 
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Gelaran</label>
                            <input type="text" id="name" disabled
                                value="{{ $record->ahbab->nickname }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                        focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div> 
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tarikh Lahir</label>
                            <input type="text" id="name" disabled
                                value="{{ $record->ahbab->dob }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                        focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div> 
                        <div>
                            <label class="block text-sm font-medium text-gray-700">No. K/P</label>
                            <input type="text" id="name" disabled
                                value="{{ $record->ahbab->nric }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                        focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div> 
                        <div>
                            <label class="block text-sm font-medium text-gray-700">No H/P</label>
                            <input type="text" id="name" disabled
                                value="{{ $record->ahbab->phone }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                        focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div> 
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="text" id="name" disabled
                                value="{{ $record->ahbab->email ?? 'N/A' }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                        focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div> 
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Pekerjaan</label>
                            <input type="text" id="name" disabled
                                value="{{ $record->ahbab->occupation->occupation_name }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                        focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div> 
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Perkahwinan</label>
                            <input type="text" id="name" disabled
                                value="{{ $record->ahbab->marriage->marriage_status }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                        focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div> 
                    </div>
                    <div class="py-4 gap-4">
                        <label class="block text-sm font-medium text-gray-700">Language</label>
                        <input type="text" id="name" disabled
                            value="{{ $record->ahbab->language ?? 'N/A' }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                    focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div> 
                    <div class="py-2 gap-4">
                        <label class="block text-sm font-medium text-gray-700">Address</label>
                        <input type="text" id="name" disabled
                            value="{{ $record->ahbab->home_add }}, {{ $record->ahbab->mohallah->name }} , {{ $record->ahbab->halqah->name }}, {{ $record->ahbab->markaz->name }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                    focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div> 
                    <div class="py-2 gap-4">
                        <label class="block text-sm font-medium text-gray-700">Keterangan</label>
                        <input type="text" id="name" disabled
                            value="{{ $record->description }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                    focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div> 

                </section>

                <section class="border-b pb-4 mb-4">
                    <h2 class="text-xl font-semibold mb-2">Azam Information</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4"> {{-- Grid for responsive layout --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tempoh</label>
                            <input type="text" id="name" disabled
                                value="{{ $record->azam->duration }} H"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                        focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div> 
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tarikh Check-In</label>
                            <input type="text" id="name" disabled
                                value="{{ $record->azam->checkin }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                        focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div> 
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tahun Lepas</label>
                            <input type="text" id="name" disabled
                                value="{{ $record->azam->last1y }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                        focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div> 
                        <div>
                            <label class="block text-sm font-medium text-gray-700">2 Tahun Lepas</label>
                            <input type="text" id="name" disabled
                                value="{{ $record->azam->last2y }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                        focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div> 
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Cuti</label>
                            <input type="text" id="name" disabled
                                value="{{ $record->azam->cuti ? 'Ada' : 'Tiada' }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                        focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div> 
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Kebenaran</label>
                            <input type="text" id="name" disabled
                                value="{{ $record->azam->permission ? 'Ada' : 'Tiada' }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                        focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div> 
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Passport</label>
                            <input type="text" id="name" disabled
                                value="--Field not ready--"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                        focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div> 
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Belanja</label>
                            <input type="text" id="name" disabled
                                value="{{ $record->azam->expense }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                        focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div> 
                    </div>
                    <div class="py-4 gap-4">
                        <label class="block text-sm font-medium text-gray-700">Nota</label>
                        <input type="text" id="name" disabled
                            value="{{ $record->azam->description ?? 'N/A'}}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                    focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div> 

                    <br/>
                    <h2 class="text-xl font-semibold mb-2">Pengalaman Information</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4"> {{-- Grid for responsive layout --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">IPB Pertama</label>
                            <input type="text" id="name" disabled
                                value="-- Field Not Ready --"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                        focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div> 
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tertib Pertama</label>
                            <input type="text" id="name" disabled
                                value="-- Field Not Ready"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                        focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div> 
                    </div>
                    <div class="py-4 grid grid-cols-3 md:grid-cols-3 sm:grid-cols-3 gap-4"> {{-- Grid for responsive layout --}}
                        <label class="block text-sm font-medium text-gray-700">
                            <input type="checkbox" id="name" disabled
                                value="{{ $record->status ? 'checked' : '' }}"
                                class="border-gray-300 shadow-sm ">
                                Amer
                        </label>
                        <label class="block text-sm font-medium text-gray-700">
                            <input type="checkbox" id="name" disabled
                                value="{{ $record->status ? 'checked' : '' }}"
                                class="border-gray-300 shadow-sm ">
                                Pengendali
                        </label>
                        <label class="block text-sm font-medium text-gray-700">
                            <input type="checkbox" id="name" disabled
                                value="{{ $record->status ? 'checked' : '' }}"
                                class="border-gray-300 shadow-sm ">
                                Takmir/AMM/TDI
                        </label>
                        <label class="block text-sm font-medium text-gray-700">
                            <input type="checkbox" id="name" disabled
                                value="{{ $record->status ? 'checked' : '' }}"
                                class="border-gray-300 shadow-sm ">
                                FH/MH
                        </label>
                        <label class="block text-sm font-medium text-gray-700">
                            <input type="checkbox" id="name" disabled
                                value="{{ $record->status ? 'checked' : '' }}"
                                class="border-gray-300 shadow-sm ">
                                TM/TR
                        </label>
                        <label class="block text-sm font-medium text-gray-700">
                            <input type="checkbox" id="name" disabled
                                value="{{ $record->status ? 'checked' : '' }}"
                                class="border-gray-300 shadow-sm ">
                                2J/8J
                        </label>
                        <label class="block text-sm font-medium text-gray-700">
                            <input type="checkbox" id="name" disabled
                                value="{{ $record->status ? 'checked' : '' }}"
                                class="border-gray-300 shadow-sm ">
                                G1
                        </label>
                        <label class="block text-sm font-medium text-gray-700">
                            <input type="checkbox" id="name" disabled
                                value="{{ $record->status ? 'checked' : '' }}"
                                class="border-gray-300 shadow-sm ">
                                G2
                        </label>
                        <label class="block text-sm font-medium text-gray-700">
                            <input type="checkbox" id="name" disabled
                                value="{{ $record->status ? 'checked' : '' }}"
                                class="border-gray-300 shadow-sm ">
                                3H
                        </label>
                    </div>
                </section>


                <section class="border-b pb-4 mb-4">
                    <h2 class="text-xl font-semibold mb-2">Tafakut Information</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4"> {{-- Grid for responsive layout --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Status Tafakut</label>
                            <input type="text" id="name" disabled
                                value="{{ $record->status ? 'Passed' : 'Failed' }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                        focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div> 
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Status Proses</label>
                            <input type="text" id="name" disabled
                                value="{{ $record->flag ? 'Pending' : 'Completed' }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                        focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div> 
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Pencadang 1</label>
                            <input type="text" id="name" disabled
                                value="{{ $record->ahbab->fullname ?? 'N/A'}}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                        focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div> 
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Pencadang 2</label>
                            <input type="text" id="name" disabled
                                value="{{ $record->ahbab->fullname ?? 'N/A'}}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                        focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div> 
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Cadangan 1</label>
                            <input type="text" id="name" disabled
                                value="{{ $record->syor1 ?? 'N/A'}}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                        focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div> 
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Cadangan 2</label>
                            <input type="text" id="name" disabled
                                value="{{ $record->syor2 ?? 'N/A'}}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                        focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div> 
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tarikh Cadangan 1</label>
                            <input type="text" id="name" disabled
                                value="{{ $record->tarikh_syor1 ?? 'N/A'}}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                        focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div> 
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tarikh Cadangan 2</label>
                            <input type="text" id="name" disabled
                                value="{{ $record->tarikh_syor2 ?? 'N/A'}}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                        focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div> 
                    </div>
                    <div class="py-4 gap-4">
                        <label class="block text-sm font-medium text-gray-700">Comment</label>
                        <input type="text" id="name" disabled
                            value="{{ $record->comment ?? 'N/A'}}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                    focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div> 
                </section>


                {{-- Add more fields as needed --}}
            </div>
        </div>

        {{-- You can add more sections, forms, or components here --}}
    </div>
</x-filament-panels::page>
