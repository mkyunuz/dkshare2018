<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\BackupFile;

/**
 * BackupFileSearch represents the model behind the search form about `frontend\models\BackupFile`.
 */
class BackupFileSearch extends BackupFile
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['backup_file_id', 'distributor_id', 'backup_file_created_at', 'backup_file_updated_at'], 'safe'],
            [['week'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = BackupFile::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'backup_file_created_at' => $this->backup_file_created_at,
            'backup_file_updated_at' => $this->backup_file_updated_at,
            'week' => $this->week,
        ]);

        $query->andFilterWhere(['like', 'backup_file_id', $this->backup_file_id])
            ->andFilterWhere(['like', 'distributor_id', $this->distributor_id]);

        return $dataProvider;
    }
}
