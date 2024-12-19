<script setup>
import { ref } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link, router, useForm } from '@inertiajs/vue3';
import ActionMessage from '@/Components/ActionMessage.vue';
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const props = defineProps({
    user: Object
});


const form = useForm({
    _method: 'POST',
    name: props.user.name,
    email: props.user.email,
    password: ''
});

const verificationLinkSent = ref(null);
const photoPreview = ref(null);
const photoInput = ref(null);

const update = () => {
    form.put(route('user.update'), {
        errorBag: 'update',
        preserveScroll: true,
        onSuccess: () => ClearForm(),
    });
};
const ClearForm = () => {
    form.name = ''
    form.email = ''
    form.password = ''
}
</script>

<template>
    <AppLayout title="User">
        <FormSection @submitted="update">
            <template #title>
                Update User
            </template>

            <template #description>
                Update User
            </template>

            <template #form>

                <!-- Name -->
                <div class="col-span-6 sm:col-span-4">
                    <InputLabel for="name" value="Name" />
                    <TextInput
                        id="name"
                        v-model="form.name"
                        type="text"
                        class="mt-1 block w-full"
                        autocomplete="name"
                    />
                    <InputError :message="form.errors.name" class="mt-2" />
                </div>

                <!-- Email -->
                <div class="col-span-6 sm:col-span-4">
                    <InputLabel for="name" value="Email" />
                    <TextInput
                        id="email"
                        v-model="form.email"
                        type="text"
                        class="mt-1 block w-full"
                        autocomplete="email"
                    />
                    <InputError :message="form.errors.email" class="mt-2" />
                </div>

                <!-- Pass -->
                <div class="col-span-6 sm:col-span-4">
                    <InputLabel for="password" value="Password" />
                    <TextInput
                        id="email"
                        v-model="form.password"
                        type="password"
                        class="mt-1 block w-full"
                        autocomplete="password"
                    />
                    <InputError :message="form.errors.password" class="mt-2" />
                </div>
            </template>

            <template #actions>
                <ActionMessage :on="form.recentlySuccessful" class="me-3">
                    Saved.
                </ActionMessage>

                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Save
                </PrimaryButton>
            </template>
        </FormSection>
    </AppLayout>
</template>
