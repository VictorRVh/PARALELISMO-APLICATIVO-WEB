<script setup>
import { ref, computed, onMounted, onUnmounted, watch } from 'vue';

const props = defineProps({
    show: {
        type: Boolean,
        default: false,
    },
    maxWidth: {
        type: String,
        default: 'md',
    },
    closeable: {
        type: Boolean,
        default: true,
    },
});

const emit = defineEmits(['close']);

watch(
    () => props.show,
    () => {
        if (props.show) {
            document.body.style.overflow = 'hidden';
        } else {
            document.body.style.overflow = null;
        }
    }
);

const close = () => {
    if (props.closeable) {
        emit('close');
    }
};

const closeOnEscape = (e) => {
    if (e.key === 'Escape' && props.show) {
        close();
    }
};

onMounted(() => document.addEventListener('keydown', closeOnEscape));

onUnmounted(() => {
    document.removeEventListener('keydown', closeOnEscape);
    document.body.style.overflow = null;
});

const maxWidthClass = computed(() => {
    return {
        sm: 'modal-sm',
        md: 'modal-md',
        lg: 'modal-lg',
        xl: 'modal-xl',
        '2xl': 'modal-xxl',
    }[props.maxWidth];
});
</script>

<template>
    <div class="modal fade" :class="{ show: show }" tabindex="-1" role="dialog" aria-hidden="true" :style="{ display: show ? 'block' : 'none' }">
        <div :class="['modal-dialog', maxWidthClass]" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" aria-label="Close" @click="close"></button>
                </div>
                <div class="modal-body">
                    <slot v-if="show" />
                </div>
            </div>
        </div>
    </div>
</template>
