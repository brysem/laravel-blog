<?php

namespace Waran\Traits\Admin;

use Illuminate\Http\Request;

use Toastr;

/**
 * This Trait takes a primaryModel variable on a controller to determine its actions.
 * It requires checkboxes with the name "checked" containing IDs for the primaryModel.
 */
trait MultiDeleteTrait
{
  /**
   * Remove the specified resources from storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @param  func $options['beforeDelete', 'afterDelete']
   * @return \Illuminate\Http\Response
   */
  public function delete(Request $request)
  {
    $items = $request->only('checked');
    $items = collect($items['checked']);

    $items->transform(function($item) {
        return (int) $item;
    });

    // Create an instance of the primary model for further operations.
    $model = new $this->primaryModel;

    $items = $model::find($items->all());

    $items = $items->pluck('id');

    //Thread::whereIn('category_id', $items)->update(['category_id' => 0]);
    $model::whereIn('id', $items)->delete();

    Toastr::success($items->count(). ' Items Deleted.');

    return redirect()->back();
  }
}
