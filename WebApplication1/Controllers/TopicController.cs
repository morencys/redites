using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using MySql.Data.MySqlClient;
using dto = WebApplication1.Models;

namespace WebApplication1.Controllers
{
    public class TopicController
    {
        private MySqlDatabase MySqlDatabase { get; set; }

        public TopicController(MySqlDatabase mySqlDatabase)
        {
            this.MySqlDatabase = mySqlDatabase;
        }
        [HttpPost]
        public void Complete(dto.TopicIdentifier input)
        {
            var cmd = this.MySqlDatabase.Connection.CreateCommand() as MySqlCommand;
            cmd.CommandText = @"UPDATE Tasks SET Completed = STR_TO_DATE(@Date, '%Y/%m/%d') WHERE TaskId = @TaskId;";
            cmd.Parameters.AddWithValue("@TaskId", input.TopicId);
            cmd.Parameters.AddWithValue("@Date", DateTime.Now.ToString("yyyy/MM/dd"));

            var recs = cmd.ExecuteNonQuery();
        }
        [HttpPost]
        public void Incomplete(dto.TopicIdentifier input)
        {
            var cmd = this.MySqlDatabase.Connection.CreateCommand() as MySqlCommand;
            cmd.CommandText = @"UPDATE Tasks SET Completed = NULL WHERE TaskId = @TaskId;";
            cmd.Parameters.AddWithValue("@TaskId", input.TopicId);

            var recs = cmd.ExecuteNonQuery();
        }
        [HttpPost]
        public void Archive(dto.TopicIdentifier input)
        {
            var cmd = this.MySqlDatabase.Connection.CreateCommand() as MySqlCommand;
            cmd.CommandText = @"UPDATE Tasks SET Archived = STR_TO_DATE(@Date, '%Y/%m/%d') WHERE TaskId = @TaskId;";
            cmd.Parameters.AddWithValue("@TaskId", input.TopicId);
            cmd.Parameters.AddWithValue("@Date", DateTime.Now.ToString("yyyy/MM/dd"));

            var recs = cmd.ExecuteNonQuery();
        }
    }
}
