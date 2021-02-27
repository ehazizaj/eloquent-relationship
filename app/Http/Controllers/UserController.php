<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Validation\Validator as ValidationReturn;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    /**
     * Get all users who are form austria
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $callback = function ($query)  {
            $query->where('citizenship_country_id', 1);
        };

        $users = User::where('active', 1)->whereHas('details', $callback)->with(['details' => $callback])->get();

            $jsonForResponse = [
                'error' => false,
                'message' => "List of all active austrian users",
                'data' => $users,
            ];
            return response()->json($jsonForResponse, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return JsonResponse
     */
    public function update(Request $request, User $user): JsonResponse
    {

        $validator = $this->validator($request);
        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }

        if ($this->doesUserHasDetails($user)) {
            $user->details()->update($request->all());
            $jsonForResponse = [
                'error' => false,
                'message' => 'User updated successfully'
            ];
            return response()->json($jsonForResponse);
        } else {
            $jsonForResponse = [
                'error' => true,
                'message' => 'This user does not have available data',
            ];
            return response()->json($jsonForResponse);
        }
    }


    /**
     * Delete the specified resource in storage.
     *
     * @param User $user
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(User $user): JsonResponse
    {

        if (!$this->doesUserHasDetails($user)) {
            $user->delete();
            $jsonForResponse = [
                'error' => false,
                'message' => 'User deleted successfully',
            ];
            return response()->json($jsonForResponse);
        } else {
            $jsonForResponse = [
                'error' => true,
                'message' => 'This user can not be deleted because it has related data',
            ];
            return response()->json($jsonForResponse, 400);
        }
    }


    /**
     * Check if requested user has details data
     *
     * @param User $user
     * @return bool
     */
    protected function doesUserHasDetails(User $user): bool
    {
        return $user->details()->exists();
    }


    /**
     * Validate Request before proceeding to business logic.
     *
     * @param Request $request
     * @return ValidationReturn
     */

    public function validator(Request $request): ValidationReturn
    {
        return Validator::make($request->all(), [
            'citizenship_country_id' => ['required'],
            'first_name' => ['required'],
            'last_name' => ['required'],
            'phone_number' => ['required'],
        ]);
    }


}
