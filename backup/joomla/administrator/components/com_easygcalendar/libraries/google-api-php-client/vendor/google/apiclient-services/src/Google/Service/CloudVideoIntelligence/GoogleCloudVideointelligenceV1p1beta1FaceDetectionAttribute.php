<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

class Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p1beta1FaceDetectionAttribute extends Google_Collection
{
  protected $collection_key = 'emotions';
  protected $emotionsType = 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p1beta1EmotionAttribute';
  protected $emotionsDataType = 'array';
  protected $normalizedBoundingBoxType = 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p1beta1NormalizedBoundingBox';
  protected $normalizedBoundingBoxDataType = '';

  /**
   * @param Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p1beta1EmotionAttribute
   */
  public function setEmotions($emotions)
  {
    $this->emotions = $emotions;
  }
  /**
   * @return Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p1beta1EmotionAttribute
   */
  public function getEmotions()
  {
    return $this->emotions;
  }
  /**
   * @param Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p1beta1NormalizedBoundingBox
   */
  public function setNormalizedBoundingBox(Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p1beta1NormalizedBoundingBox $normalizedBoundingBox)
  {
    $this->normalizedBoundingBox = $normalizedBoundingBox;
  }
  /**
   * @return Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p1beta1NormalizedBoundingBox
   */
  public function getNormalizedBoundingBox()
  {
    return $this->normalizedBoundingBox;
  }
}
