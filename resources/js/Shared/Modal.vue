<template>
    <TransitionRoot
        appear
        as="template"
        :show="show"
    >
        <Dialog
            as="div"
            class="relative z-10"
            @close="close"
        >
            <TransitionChild
                @after-leave="redirect"
                as="template"
                enter="duration-300 ease-out"
                enter-from="opacity-0"
                enter-to="opacity-100"
                leave="duration-200 ease-in"
                leave-from="opacity-100"
                leave-to="opacity-0"
            >
                <div class="fixed inset-0 bg-black/75 transition-opacity" />
            </TransitionChild>

            <div class="fixed inset-0 overflow-y-auto">
                <div class="flex min-h-full items-center justify-center p-4 text-center">
                    <TransitionChild
                        as="template"
                        enter="duration-300 ease-out"
                        enter-from="opacity-0 scale-95"
                        enter-to="opacity-100 scale-100"
                        leave="duration-200 ease-in"
                        leave-from="opacity-100 scale-100"
                        leave-to="opacity-0 scale-95"
                    >
                        <DialogPanel class="w-1/3 transform overflow-hidden pb-6 rounded-2xl bg-white text-left align-middle shadow-xl transition-all">
                            <DialogTitle
                                as="h2"
                                class="text-xl font-semibold antialased leading-6 text-gray-700 border-b border-gray-300 px-6 pt-6 bg-gray-50 pb-3"
                            >
                                <slot name="title" />
                            </DialogTitle>
                            <slot />
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>

<script setup>
import {Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot} from '@headlessui/vue'
import {useModal} from 'momentum-modal'

const { show, close, redirect } = useModal()
</script>
