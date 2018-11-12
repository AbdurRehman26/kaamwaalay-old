<?php
namespace App\Http\Controllers\Api\V1;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Validator;

class FileController extends Controller
{
    public function upload(Request $request)
    {
        $key = $request->key;
        $config = config("uploads.{$key}");

        if ($config) {

            $field = isset($config['field']) ? $config['field'] : 'file';

            $this->validate(
                $request, [
                $field => $config['rules'],
                ]
            );

            $response = [];

            $file = $request->file($field);
            $file->store($config['folder']);

            if (!empty($config['thumb'])) {

                $conf = $this->mergeConfigWithDefault($config['thumb']);

                $manager = new ImageManager(
                    [
                    'driver' => $conf['driver'],
                    ]
                );

                $image = $manager->make($file);

                $response['width'] = $image->width();
                $response['height'] = $image->height();

                $method = $conf['method'];

                if ($method instanceof Closure) {
                    $method($image, $conf);
                } else {
                    switch($method) {
                    default:
                        $args = [$conf['width'], $conf['height'], null, $conf['anchor']];
                        break;
                    case 'fit':
                        $args = [$conf['width'], $conf['height']];
                        $args[] = function ($constraint) {
                                    $constraint->aspectRatio();
                                    $constraint->upsize();
                        };
                        break;
                    case 'resize':
                        $args = [$conf['width'], $conf['height']];
                        $args[] = function ($constraint) {
                                    $constraint->aspectRatio();
                                    $constraint->upsize();
                        };
                        break;
                    case 'heighten':
                        $args = [$conf['height']];
                        break;
                    case 'widen':
                        $args = [$conf['widen']];
                        break;
                    case 'resizeCanvas':
                        $args = [$conf['width'], $conf['height']];

                        if (isset($conf['anchor'])) {
                            $args[] = $conf['anchor'];
                        }
                        break;
                    };

                    call_user_func_array([$image, $method], $args);
                }
                Storage::put($conf['folder'] . $file->hashName(), $image->stream()->__toString());

                $response['thumbnail_url'] = Storage::url($conf['folder'] . $file->hashName());
            }

            $response['name'] = $file->hashName();
            $response['upload_url'] = Storage::url($config['folder'] . '/' . $file->hashName());

            return $this->prepareUploadSuccessfulResponse($response, $file);
        }
        abort(404);
    }

    private function mergeConfigWithDefault(array $config)
    {
        return array_merge(
            [
            'anchor' => 'center',
            'driver' => 'imagick',
            'method' => 'resize',
            'anchor' => 'top',
            ], $config
        );
    }

    private function prepareUploadSuccessfulResponse(array $response, $file)
    {
        return array_merge(
            $response, [
            'type' => 'upload',
            'success' => true,
            'original_name' => $file->getClientOriginalName(),
            ]
        );
    }
}
