@extends('layouts.master')

@section('title', $title)

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @component('components.card',['type' => 'info'])
                @slot('header')
                    <h3 class="card-title">{{ $title }}</h3>
                    <div class="card-tools">
                        <a href="{{ route('languages.index') }}" class="btn btn-sm btn-info back-button">
                            {{ __('Language List') }}
                        </a>
                    </div>
                @endslot
                <div class="row">
                    <div class="col-md-12">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-info dropdown-toggle"
                                    data-toggle="dropdown"
                                    aria-expanded="false">
                                @{{ selectedLanguage | uppercase }}
                                <span class="caret"></span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-left" role="menu">
                                <a :class="selectedLanguage == language ? 'dropdown-item active' : 'dropdown-item' " v-for="language in languages" href="javascript:"
                                   @click="changeLanguage(language)">
                                    @{{ language | uppercase }}
                                </a>
                            </div>
                        </div>

                        <div class="pull-right">
                            <button @click="add"
                                    class="btn btn-sm btn-warning">{{ __('Add New') }}
                            </button>
                            <button @click="sync"
                                    class="btn btn-sm btn-primary">{{ __('Sync') }}
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="input-group mb-3 pr-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" v-model="searchPhrase"
                                   @keyup="searchTranslations" placeholder="Search">
                        </div>

                        <div id="setting-scroll" class="cm-mt-15">
                            <div class="list-group" v-if="Object.keys(filteredTranslations).length">
                                <div class="cursor-pointer"
                                     v-for="(value, key) in filteredTranslations"
                                     @click="selectedKey = key;addNewKey = false"
                                     :class="['list-group-item', 'list-group-item-action', {'list-group-item-danger': !value}]">
                                    <div class="d-flex w-100 justify-content-between">
                                        <strong class="mb-1" v-html="highlight(key)"></strong>
                                    </div>
                                    <small class="text-muted" v-html="highlight(value)"></small>
                                </div>
                            </div>
                            <div class="text-center" v-else>
                                <span>{{ __("No translation match with your search key.") }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div v-if="addNewKey">
                            <input type="text" class="form-control" placeholder="{{ __('New Key...') }}"
                                   v-model="newKey">
                            <span class="help-block text-red">@{{ newKeyErrorMsg }}</span>

                            <textarea name="" rows="10" class="form-control my-3"
                                      v-model="newKeyValue"
                                      placeholder="Translate..."></textarea>
                            <span class="help-block text-red">@{{ newKeyValueErrorMsg }}</span>

                            <div class="cm-mt-15">
                                <button class="btn btn-sm btn-primary btn-sm"
                                        @click="saveNewKey">{{ __('Save') }}
                                </button>
                            </div>
                        </div>
                        <div v-else>
                            <div v-if="selectedKey">
                                <p class="mb-4" v-html="highlight(selectedKey)"></p>

                                <textarea name="" rows="10" class="form-control mb-4"
                                          v-model="translations[selectedLanguage][selectedKey]"
                                          @keyup="changeTranslations(selectedKey, $event)"
                                          placeholder="Translate..."></textarea>

                                <div class="cm-mt-15">
                                    <button class="btn btn-sm btn-primary btn-sm"
                                            @click="save">{{ __('Save') }}
                                    </button>
                                    <button class="btn btn-sm btn-danger btn-sm"
                                            @click="remove">{{ __('Delete') }}
                                    </button>
                                </div>
                            </div>

                            <h6 class="text-muted text-center mt-5" v-else>
                                {{ __('Select a key from the list to the left') }}
                            </h6>
                        </div>
                    </div>
                </div>
            @endcomponent
        </div>
    </div>

    <confirmation-dialog
        :messages="{
            title: '{{ __("Are you sure you want to delete this key?") }}',
            cancelButtonText: '{{ __("Cancel") }}',
    confirmButtonText: '{{ __("Confirm") }}'
        }"

        v-if='confirmDialog' @confirm='confirmDelete'
        @cancel="cancelDelete"></confirmation-dialog>

@endsection

@section('script')
    <script>
        const data = {
            languages: @json(language_short_code_list()),
            selectedLanguage: '{{ app()->getLocale() }}'.toLowerCase(),
            newKeyError: "{{ __('This new key field is required') }}",
            newKeyValueError: "{{ __('This new key value field is required') }}",
            routes: {
                getTranslations: '{{ route("languages.translations") }}',
                update: '{{ route("languages.update.settings") }}',
                sync: '{{ route("languages.sync") }}'
            }
        }
        $(window).on("load",function(){
            $("#setting-scroll").mCustomScrollbar({
                setHeight:"500px",
                axis: "yx",
                theme:"dark",
                scrollInertia:200
            });
        });
    </script>
    <script src="{{ asset('js/language.js') }}?t={{ time() }}"></script>
@endsection


