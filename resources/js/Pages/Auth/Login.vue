<template>
  <AuthLayout>
    <Card class="w-full max-w-md mx-auto">
      <CardHeader class="text-center">
        <CardTitle class="text-2xl">Sign in to your account</CardTitle>
        <CardDescription>
          Enter your email and password to access your account
        </CardDescription>
      </CardHeader>

      <CardContent>
        <form @submit.prevent="submit" class="space-y-4">
          <!-- Email -->
          <div class="space-y-2">
            <Label for="email">Email address</Label>
            <Input
              id="email"
              v-model="form.email"
              type="email"
              autocomplete="email"
              placeholder="Enter your email"
              required
              :class="{ 'border-destructive': form.errors.email }"
            />
            <p v-if="form.errors.email" class="text-sm text-destructive">
              {{ form.errors.email }}
            </p>
          </div>

          <!-- Password -->
          <div class="space-y-2">
            <Label for="password">Password</Label>
            <Input
              id="password"
              v-model="form.password"
              type="password"
              autocomplete="current-password"
              placeholder="Enter your password"
              required
              :class="{ 'border-destructive': form.errors.password }"
            />
            <p v-if="form.errors.password" class="text-sm text-destructive">
              {{ form.errors.password }}
            </p>
          </div>

          <!-- Remember Me -->
          <div class="flex items-center justify-between">
            <div class="flex items-center space-x-2">
              <Checkbox
                id="remember"
                v-model:checked="form.remember"
              />
              <Label
                for="remember"
                class="text-sm font-normal cursor-pointer"
              >
                Remember me
              </Label>
            </div>

            <Link
              href="/forgot-password"
              class="text-sm font-medium text-primary hover:underline"
            >
              Forgot password?
            </Link>
          </div>

          <!-- Display general errors if any -->
          <Alert v-if="form.errors.general" variant="destructive">
            <AlertCircle class="h-4 w-4" />
            <AlertTitle>Error</AlertTitle>
            <AlertDescription>
              {{ form.errors.general }}
            </AlertDescription>
          </Alert>
        </form>
      </CardContent>

      <CardFooter class="flex flex-col space-y-4">
        <Button
          type="submit"
          :disabled="form.processing"
          class="w-full"
          @click="submit"
        >
          <Loader2
            v-if="form.processing"
            class="mr-2 h-4 w-4 animate-spin"
          />
          {{ form.processing ? 'Signing in...' : 'Sign in' }}
        </Button>

        <p class="text-sm text-muted-foreground text-center">
          Don't have an account?
          <Link
            href="/register"
            class="font-medium text-primary hover:underline ml-1"
          >
            Sign up
          </Link>
        </p>
      </CardFooter>
    </Card>
  </AuthLayout>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import { Link } from '@inertiajs/vue3'
import AuthLayout from '@/Layouts/AuthLayout.vue'

// Shadcn Components
import { Button } from '@/components/ui/button'
import { Input } from '@/components/ui/input'
import { Label } from '@/components/ui/label'
import { Checkbox } from '@/components/ui/checkbox'
import { Alert, AlertDescription, AlertTitle } from '@/components/ui/alert'
import {
  Card,
  CardContent,
  CardDescription,
  CardFooter,
  CardHeader,
  CardTitle
} from '@/components/ui/card'

// Icons
import { Loader2, AlertCircle } from 'lucide-vue-next'

const form = useForm({
  email: '',
  password: '',
  remember: false,
})

const submit = () => {
  form.post('/login', {
    onFinish: () => form.reset('password'),
  })
}
</script>
