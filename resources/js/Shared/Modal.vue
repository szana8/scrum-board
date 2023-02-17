<template>
    <TransitionRoot
        appear
        as="template"
        :show="show"
    >
        <Dialog
            as="div"
            class="relative z-10"
            @close="closeModal"
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
                        <DialogPanel class="w-3/6 transform overflow-hidden pb-6 rounded-2xl bg-white text-left align-middle shadow-xl transition-all">
                            <div>
                                <div class="absolute -right-10 top-16 -z-50 rotate-12 opacity-5 space-y-1">
                                    <div class="bg-purple-500 rounded w-72 h-6 ml-24"></div>
                                    <div class="bg-purple-400 rounded w-96 h-6"></div>
                                    <div class="bg-purple-300 rounded w-56 h-6 ml-44"></div>
                                </div>
                                <DialogTitle
                                    as="h2"
                                    class="px-6 pt-6 pb-3 z-10"
                                >
                                    <slot name="title" />
                                </DialogTitle>
                                <slot class="z-10 bg" />
                            </div>

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

const props = defineProps({
    onlyWithButton: {
        type: Boolean,
        default: false,
    },
})

function closeModal() {
    if (!props.onlyWithButton) {
        close()
    }
}
</script>
