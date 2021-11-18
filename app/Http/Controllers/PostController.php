<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Exception;
use Illuminate\Http\Request;
use App\Services\PostService;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    /**
     * @OA\Get(
     *   path="/api/posts",
     *   tags={"Post"},
     *   summary="List of posts",
     *   operationId="listPost",
     *   security={ {"bearerAuth":{}}},
     *
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *    response=401,
     *    description="Returns when user is not authenticated",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example=""),
     *    )
     *   ),
     *)
     **/
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = ['status' => 200];
        try{
            $result['data'] = $this->postService->getAll();
        }catch(Exception $e){
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }
        return response()->json($result , $result['status']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * @OA\Post(
     *   path="/api/posts",
     *   tags={"Post"},
     *   summary="Store post",
     *   operationId="storePost",
     *   security={ {"bearerAuth":{}}},
     *
     *   @OA\Parameter(
     *      name="title",
     *      in="query",
     *      required=true,
     *      example="title",
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *
     *   @OA\Parameter(
     *      name="content",
     *      in="query",
     *      required=true,
     *      example="content",
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *
     *    @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 allOf={
     *                     @OA\Schema(
     *                         @OA\Property(
     *                             description="Image",
     *                             property="image",
     *                             type="file"
     *                        )
     *                    )
     *                }
     *            )
     *        )
     *    ),
     *
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *    response=401,
     *    description="Returns when user is not authenticated",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example=""),
     *    )
     *   ),
     *)
     **/
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\PostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $data = $request->all();
        $result = ['status' => 200];
        try{
            $result['data'] = $this->postService->savePostData($data);
        }catch(Exception $e){
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }
        return response()->json($result , $result['status']);
    }

    /**
     * @OA\Get(
     *   path="/api/posts/{id}",
     *   tags={"Post"},
     *   summary="Show post",
     *   operationId="showPost",
     *   security={ {"bearerAuth":{}}},
     *
     *   @OA\Parameter(
     *      name="id",
     *      in="path",
     *      required=true,
     *      example=1,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     *
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *    response=401,
     *    description="Returns when user is not authenticated",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example=""),
     *    )
     *   ),
     *)
     **/
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = ['status' => 200];
        try{
            $result['data'] = $this->postService->getById($id);
        }catch(Exception $e){
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }
        return response()->json($result , $result['status']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * @OA\Put(
     *   path="/api/posts/{id}",
     *   tags={"Post"},
     *   summary="Update post",
     *   operationId="updatePost",
     *   security={ {"bearerAuth":{}}},
     *
     *   @OA\Parameter(
     *      name="id",
     *      in="path",
     *      required=true,
     *      example=1,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     *
     *   @OA\Parameter(
     *      name="title",
     *      in="query",
     *      required=true,
     *      example="title",
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *
     *   @OA\Parameter(
     *      name="content",
     *      in="query",
     *      required=true,
     *      example="content",
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *
     *    @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 allOf={
     *                     @OA\Schema(
     *                         @OA\Property(
     *                             description="Image",
     *                             property="image",
     *                             type="file"
     *                        )
     *                    )
     *                }
     *            )
     *        )
     *    ),
     *
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *    response=401,
     *    description="Returns when user is not authenticated",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example=""),
     *    )
     *   ),
     *)
     **/
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\PostRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
